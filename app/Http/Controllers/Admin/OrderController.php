<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAddress;
use App\Models\Order;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OrderController extends Controller
{
    public function index():view
    {
        $deliveryAddresses = DeliveryAddress::all();
        return view('admin.orders.index',compact('deliveryAddresses'));
    }

    public function show(Order $order)
    {

        $order->load('orderItems', 'deliveryAddress', 'payment');

        // Calculate total amount
        $totalAmount = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        // Pass the order, total amount, and related data to the view
        return view('admin.orders.show', compact('order', 'totalAmount'));

    }

//    public function destroy()
//    {
//        // Get the order ID from the request
//        $orderId = request('order_id');
//
//        // Delete the order and related data
//        DB::transaction(function () use ($orderId) {
//            Order::destroy($orderId);
//            DeliveryAddress::where('order_id', $orderId)->delete();
//        });
//
//        // Redirect with success message
//        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
//    }


public function destroy(Order $order){
        // Delete the order and related data
        DB::transaction(function () use ($order) {
            $order->delete();
            DeliveryAddress::where('order_id', $order->id)->delete();
        });

        // Redirect with success message
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');

}





}
