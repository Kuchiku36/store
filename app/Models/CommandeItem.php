<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeItem extends Model
{
    use HasFactory;
    
    protected $fillable =[  'commande_id',
                            'product_id',
                            'quantite',
                            'price'];

    /**
     * Get the commande that owns the CommandeItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class, 'foreign_key', 'other_key');
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'foreign_key', 'other_key');
    }
}
