<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Pelanggan::class, 'user_id', 'id');
    }
}
