<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Product;

class Season extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'product_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
