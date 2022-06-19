<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'user_id'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'construction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
