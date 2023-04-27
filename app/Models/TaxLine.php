<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaxLine extends Model
{
    use HasFactory;

    protected $fillable = [
        "rate_code",
        "rate_id",
        "order_id",
        "label",
        "compound",
        "tax_total",
        "shipping_tax_total",
    ];

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function rate() : HasOne
    {
        return $this->hasOne(Rate::class, 'id');
    }
}
