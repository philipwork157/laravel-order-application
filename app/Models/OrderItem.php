<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function product() : HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function variation() : HasOne
    {
        return $this->hasOne(Product::class);
    }
}
