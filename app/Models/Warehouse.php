<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Warehouse extends Model
{
    use HasFactory;

    // отключил защиту
    protected $guarded = false;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
