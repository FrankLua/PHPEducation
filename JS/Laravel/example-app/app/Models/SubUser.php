<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * PHP version 8.3.3
 * Disctription: Future functionality

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  App\Models;
 */
class SubUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'influence_id',
        'subscribe_id'
    ];
    public $timestamps = false;
    protected $table = "sub_users";

    public function influenceUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'influence_id', 'id');
    }


}