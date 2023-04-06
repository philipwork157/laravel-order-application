<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    public function address(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function transactionType() : HasOne
    {
        return $this->hasOne(TransactionType::class, 'id');
    }

    public function transactionStatus() : HasOne
    {
        return $this->hasOne(TransactionStatus::class, 'id');
    }

    public function currency() : HasOne
    {
        return $this->hasOne(Currency::class, 'id');
    }

}
