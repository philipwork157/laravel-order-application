<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ShippingLine extends Model
{
    use HasFactory;

    protected $fillable = [
        "method_title",
        "order_id",
        "method_id",
        "total",
        "total_tax",
    ];

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function methods() : HasMany
    {
        return $this->hasMany(Method::class, 'id');
    }
}
