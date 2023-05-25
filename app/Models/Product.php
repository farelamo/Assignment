<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'product_branch', 'product_id', 'branch_id');
    }
}
