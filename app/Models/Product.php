<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = ['id'];

    public function brand() : BelongsTo {
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
