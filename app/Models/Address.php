<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        "order_id",
        "address_type_id",
        "first_name",
        "last_name",
        "company",
        "address_1",
        "address_2",
        "city",
        "state",
        "postcode",
        "country",
        "email",
        "phone",
    ];

    public function addressType() : HasOne
    {
        return $this->hasOne(AddressType::class);
    }
}
