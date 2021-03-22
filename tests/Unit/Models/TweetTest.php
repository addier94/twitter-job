<?php

namespace Tests\Unit\Models;

use App\Models\Follower;
use App\Models\Tweet;
use App\Models\User;
use Tests\TestCase;

class TweetTest extends TestCase
{
/** @test */
    public function can_get_tweets_from_following()
    {
//        test relationships hasManyThrough
        $alfredo = User::factory()->create(['name' => 'Alfredo']);
        $efrain = User::factory()->create(['name' => 'Efrain']);
        $bulma = User::factory()->create(['name' => 'Bulma']);
        $moises = User::factory()->create(['name' => 'Moises']);
        $isac = User::factory()->create(['name' => 'Isac']);

        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $efrain->id]);
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $bulma->id]);
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $moises->id]);
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $isac->id]);

        Tweet::factory()->create(['user_id'=>$efrain->id, 'body'=>'e great job']);
        Tweet::factory()->create(['user_id'=>$bulma->id, 'body'=>'b incredible']);
        Tweet::factory()->create(['user_id'=>$moises->id, 'body'=>'m yeah great!']);
        Tweet::factory()->create(['user_id'=>$isac->id, 'body'=>'i uff maybe']);

        $this->assertTrue($alfredo->tweetsFromFollowing->contains(function ($val, $key) {
            return $val;
        }));

        $this->assertEquals(4, $alfredo->tweetsFromFollowing->count());

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $alfredo->tweetsFromFollowing);
    }
}
