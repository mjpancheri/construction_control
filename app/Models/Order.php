<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total'];

    public function items()
    {
        return $this->hasMany(Item::class, 'order_id');
    }

    public function construction()
    {
        return $this->belongsTo(Construction::class, 'construction_id');
    }
}
