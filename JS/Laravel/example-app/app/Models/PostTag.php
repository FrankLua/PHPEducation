<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * PHP version 8.3.3
 * Disctription: Future functionality

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  App\Models;
 */
class PostTag extends Model
{
    use HasFactory;

    protected $table = "post_tags";
    protected $fillable = [
        'post_id',
        'user_tag'
    ];
    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}