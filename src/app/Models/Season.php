<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Season extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'product_id'];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
