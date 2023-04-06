<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems() : HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function currency() : HasOne
    {
        return $this->hasOne(Currency::class, 'id');
    }

    public function processingStatus() : HasOne
    {
        return $this->hasOne(ProcessingStatus::class, 'id');
    }

    public function addresses() : HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function shippingLines() : HasMany
    {
        return $this->hasMany(ShippingLine::class,);
    }

    public function taxLines() : HasMany
    {
        return $this->hasMany(TaxLine::class);
    }

    public function metaData() : hasMany
    {
        return $this->hasMany(MetaData::class);
    }

    public function taxes() : hasMany
    {
        return $this->hasMany(Taxe::class);
    }

    public function transactions() : hasMany
    {
        return $this->hasMany(Transaction::class);
    }

}
