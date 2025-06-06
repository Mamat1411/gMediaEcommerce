<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'products';
    protected $guarded = ['id'];
    protected $with = ['brand', 'category'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', 'like', '%' . $category . '%')
                      ->orWhere('slug', 'like', '%' . $category . '%');
            });
        });

        $query->when($filters['brand'] ?? false, function ($query, $brand) {
            return $query->whereHas('brand', function ($query) use ($brand) {
                $query->where('name', 'like', '%' . $brand . '%')
                      ->orWhere('slug', 'like', '%' . $brand . '%');
            });
        });
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable() : array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
