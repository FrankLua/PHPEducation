<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * PHP version 8.3.3
 * Disctription: Future functionality

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  App\Models;
 */
class PostHash extends Model
{
    use HasFactory;

    protected $table = "post_hashes";
    protected $fillable = [
        'post_id',
        'hashtag_id'
    ];
    public $timestamps = false;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

}