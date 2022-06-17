<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['quantity', 'price'];

    public function material()
    {
        return $this->hasOne(Material::class,'material_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
