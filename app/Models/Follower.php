<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Follower
 *
 * @property int $id
 * @property int $user_id
 * @property int $following_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FollowerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Follower newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follower newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Follower query()
 * @method static \Illuminate\Database\Eloquent\Builder|Follower whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Follower whereFollowingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Follower whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Follower whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Follower whereUserId($value)
 * @mixin \Eloquent
 */
class Follower extends Model
{
    use HasFactory;

//    protected $fillable = ['user_id', 'following_id'];
    protected $guarded = [];
}
