<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Method extends Model
{
    use HasFactory;

    public function shippingLine(): BelongsTo
    {
        return $this->belongsTo(ShippingLine::class);
    }
}
