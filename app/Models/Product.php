<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Warehouse;

class Product extends Model
{
    use HasFactory;

    // отключил защиту
    protected $guarded = false;

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withPivot('quantity');
    }
}
