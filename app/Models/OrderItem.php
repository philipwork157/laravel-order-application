<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "order_id",
        "product_id",
        "variation_id",
        "quantity",
        "tax_class",
        "subtotal",
        "subtotal_tax",
        "total",
        "total_tax",
        "sku",
        "price"
    ];

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
