<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderByItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'menu_list_id', 'quantity'
    ];
   public function MenuList()
    {
        return $this->belongsTo('App\Models\MenuList');
    }

}
