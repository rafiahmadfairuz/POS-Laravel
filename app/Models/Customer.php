<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'company',
        'email',
        'phone',
        'address',
        'tin',
        'customer_group_id'
    ];

    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class);
    }
}