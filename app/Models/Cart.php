<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'amount'
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
