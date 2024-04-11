<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HashTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'hashtag',
    ];

    public $timestamps = false;

    protected $table = "hashtags";

    public function hashTags(): HasMany
    {
        return $this->hasMany(PostHash::class, 'hashtag_id', 'id');
    }



}