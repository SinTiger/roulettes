<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Warehouse;

class Supply extends Model
{
    use HasFactory;

    // отключил защиту
    protected $guarded = false;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
