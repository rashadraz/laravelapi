<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /*
     **
     * defining Belongs to relationship with User
     **
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
     **
     * defining Has Many relationship with Order Items ie : Order Has Many OrderItems
     **
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
