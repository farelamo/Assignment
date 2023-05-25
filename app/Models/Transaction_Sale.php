<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_Sale extends Model
{
    use HasFactory;

    protected $casts = [
        'transaction_date' => 'datetime:Y-m-d',
    ];

    protected $table = 'transaction_sale';

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d');
    }
}
