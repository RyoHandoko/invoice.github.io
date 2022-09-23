<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public function invoiceDetail()
    {
        return $this->hasMany(invoiceDetail::class, 'product_id', 'id');
    }
}
