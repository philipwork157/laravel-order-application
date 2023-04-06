<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcessingStatus extends Model
{
    use HasFactory;

    protected $table = 'processing_status';

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
