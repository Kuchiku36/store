<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable=[ 'category_id',
                          'nom',
                          'description',
                          'price',
                          'images'] ;

    
    use HasFactory;


/**
 * Get the category that owns the Product
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function Category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}
}
