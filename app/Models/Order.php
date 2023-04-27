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

    protected $fillable = [
        "date_paid",
        "payment_method_title",
        "payment_method",
        "user_id",
        "currency_id",
        "processing_status_id",
        "number",
        "shipping_total",
        "shipping_tax",
        "cart_tax",
        "total",
        "total_tax",
        "prices_include_tax",
        "user_note",
    ];

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
