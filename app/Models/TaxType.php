<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxType extends Model
{
    use HasFactory;

    public function tax(): BelongsTo
    {
        return $this->belongsTo(Taxe::class);
    }
}
