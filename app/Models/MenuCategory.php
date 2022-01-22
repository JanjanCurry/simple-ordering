<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function MenuList()
    {
        return $this->hasMany('App\Models\MenuList', 'category_id', 'id');
    }

}
