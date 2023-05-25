<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_branch', 'branch_id', 'product_id');
    }
    
}
