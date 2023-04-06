<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Taxe extends Model
{
    use HasFactory;

    public function taxType() : HasOne
    {
        return $this->hasOne(TaxType::class);
    }

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function orderItem() : HasOne
    {
        return $this->hasOne(OrderItem::class);
    }

}
