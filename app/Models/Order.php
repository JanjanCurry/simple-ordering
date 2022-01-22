<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_sales'
    ];
    public function OrderByItem()
    {
        return $this->hasMany('App\Models\OrderByItem');
    }
    // public function MenuCategory()
    // {
    //     return $this->hasManyThrough('App\Models\MenuCategory', 'App\Models\OrderByItem', 'order_id');
    // }
}
