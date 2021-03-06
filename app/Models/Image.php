<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'path'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'image_tag');
    }
}
