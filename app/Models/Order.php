<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'discount',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Define the relationship with DeliveryAddress
    public function deliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::class);
    }

    // Define the relationship with Payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
