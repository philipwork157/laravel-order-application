<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $fillable = [
        "meta_data_type_id",
        "order_id",
        "order_item_id",
        "tax_line_id",
        "shipping_line_id",
        "key",
        "value",
    ];
}
