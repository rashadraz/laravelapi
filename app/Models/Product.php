<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /*
     **
     * defining belongs to relationship with Category
     **
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
     **
     * defining has Many relationship with OrderItem
     **
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
