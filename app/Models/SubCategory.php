<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->where('status', 1);
    }

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
