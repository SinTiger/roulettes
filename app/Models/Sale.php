<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Buyer;
use App\Models\Product;

class Sale extends Model
{
    use HasFactory;

    // отключил защиту
    protected $guarded = false;

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
