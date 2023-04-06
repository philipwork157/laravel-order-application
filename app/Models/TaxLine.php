<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TaxLine extends Model
{
    use HasFactory;

    public function order() : HasOne
    {
        return $this->hasOne(Order::class);
    }

    public function rate() : HasOne
    {
        return $this->hasOne(Rate::class, 'id');
    }
}
