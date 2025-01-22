<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'season_id'];
    protected $fillable = ['name', 'price', 'image_path', 'description'];

    public function seasons(): BelongsToMany {
      return $this->belongsToMany(Season::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
      if (!empty($keyword)) {
      $query->where('name', 'like', '%' . $keyword . '%');
    }
}
}
