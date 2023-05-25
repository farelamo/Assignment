<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'transaction_sale', 'customer_id', 'salesman_id');
    }

    public function transaction_sale()
    {
        return $this->hasMany(Transaction_Sale::class);
    }
}
