<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * PHP version 8.3.3
 * Disctription: Model for work with object 'post'

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  App\Models;
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'user_tag',
        'title',
        'short_content'


    ];

    public $timestamps = false;

    protected $table = "posts";

    /**
     * Get the post that owns the comment.
     */
    public function postHash(): HasMany
    {
        return $this->hasMany(PostHash::class, 'post_id', 'id');
    }





}