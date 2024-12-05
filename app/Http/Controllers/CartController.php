<?php

namespace App\Http\Controllers;


use App\Models\DeliveryAddress;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Setting;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    private function settings(): Collection
    {
        return new Collection(Setting::pluck('value', 'setting_name'));
    }

    protected $menuItem;

    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
    }

    public function addToCart(Request $request, $id): RedirectResponse
    {
        $menuItem = MenuItem::with('category')->findOrFail($id);

        $action = $request->input('action'); // This action only for delete

        $item = [
            'product' => $menuItem,
            'price' => $menuItem->price,
            'quantity' => 1,
            'total' => $menuItem->price,
        ];

        $cart = Session::get('cart', []);

        $found = false;

        if (!empty($cart)) {
            foreach ($cart as $i => $cartItem) {
                if ($cartItem['product']->id == $menuItem->id) {
                    $found = true;

                    if ($cartItem['quantity'] <= 1 && $action === 'delete') {
                        break;
                    }

                    if ($action === 'delete') {
                        $cartItem['quantity'] -= 1;
                    } else {
                        $cartItem['quantity'] += 1;
                    }

                    $cartItem['total'] = $cartItem['quantity'] * $cartItem['price'];

                    $cart[$i] = $cartItem;
                    break;
                }
            }
        }

        if (!$found) {
            $cart[] = $item;
        }

        Session::put('cart', $cart);

        toastr()->addSuccess('Product add to cart');
        return redirect()->back();
    }

    public function singleAddToCart($id)
    {

    }


    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
//    public function updateCart(Request $request, $id = null): RedirectResponse
//    {
//        if (!$id) {
//            return redirect()->back()->with('error', 'Missing item ID in request!');
//        }
//
//        $quantity = $request->get('quantity', 1);
//        $cart = session()->get('cart', []);
//
//        if ($quantity < 1) {
//            return redirect()->back()->with('error', 'Invalid quantity. Please enter a positive value.');
//        }
//
//        if (!isset($cart[$id])) {
//            return redirect()->back()->with('error', 'Item not found in cart!');
//        }
//        $cart[$id]['quantity'] = $quantity;
//
//        session()->put('cart', $cart);
//
//        return redirect()->back()->with('success', 'Cart updated successfully!');
//    }


    public function removeFromCart($index)
    {
        $cart = Session::get('cart');

        if (array_key_exists($index, $cart)) {
            unset($cart[$index]);

            Session::put('cart', $cart);

            toastr()->addSuccess('Product remove to cart');
            return redirect()->back();
        }

        return redirect()->back()->with('message', 'Invalid your request');
    }

    public function checkoutIndex()
    {
        $settings = $this->settings();
        if (!Auth::guard('customer')->check()) {
            $query = request()->getQueryString();

            $url = route('website.customer.login') . ($query ? "?$query" : '');
            return redirect($url);
        }

        $carts = session()->get('cart', []);

        return view('website.checkout', compact('settings', 'carts'));

    }

    public function order(Request $request)
    {
        /**
         * Validate the request
         */
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string|max:500',
            'note' => 'nullable|string|max:1000',
            'payment_method' => 'required|in:Cash On Delivery,bKash',
        ]);

        DB::beginTransaction();

        try {
            // Order
            $order = new Order();
            $order->fill([
                'customer_id' => Auth::guard('customer')->id(),
                'discount' => 0,
                'status' => 'Pending',
            ]);
            $order->save();
            $order_id = $order->id;

            // OrderItems
            $carts = Session::get('cart');

            foreach ($carts as $cart) {
                $orderItem = new OrderItem();
                $orderItem->fill([
                    'order_id' => $order_id,
                    'menu_item_id' => $cart['product']->id,
                    'quantity' => $cart['quantity'],
                    'price' => $cart['total'],
                    'discount' => 0,
                ]);
                $orderItem->save();
            }

            // DeliveryAddress
            $deliveryAddress = new DeliveryAddress();
            $deliveryAddress->fill([
                'order_id' => $order_id,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'note' => $request->input('note'),
            ]);
            $deliveryAddress->save();

            // Payment
            $payment = new Payment();
            $payment->fill([
                'order_id' => $order_id,
                'payment_method' => $request->input('payment_method'),
                'amount' => 0,
                'transaction_id' => null,
                'status' => 'Pending',
            ]);
            $payment->save();

            DB::commit();

            toastr()->addSuccess('Your order has been successfully placed');
            Session::forget('cart');

            return redirect()->route('website.customer.order');
        } catch (Exception $exception) {
            DB::rollBack();
            toastr()->addError($exception->getMessage());

            return redirect()
                ->back()
                ->withInput();
        }
    }



}
