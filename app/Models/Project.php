<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->where('status', 1);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class)->where('status', 1);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)->where('status', 1);
    }
}
