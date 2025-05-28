<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    public function subCategories():hasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function projects():hasMany
    {
        return $this->hasMany(Project::class);
    }
}
