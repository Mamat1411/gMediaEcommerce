<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    public function product() : HasMany {
        return $this->hasMany(Product::class);
    }

    public function sluggable() : array {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
