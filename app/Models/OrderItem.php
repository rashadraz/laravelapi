<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /*
     **
     * defining belongs to relationship with Order
     **
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /*
     **
     * defining belongs to relationship with Product
     **
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
