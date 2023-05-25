<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $table = 'salesman';

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'transaction_sale', 'salesman_id', 'customer_id');
    }

    public function transaction_sale()
    {
        return $this->hasMany(Transaction_Sale::class);
    }
}
