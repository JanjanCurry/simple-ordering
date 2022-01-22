<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'name', 'tax', 'price'
    ];

   public function MenuCategory()
    {
        return $this->belongsTo('App\Models\MenuCategory', 'category_id');
    }

}
