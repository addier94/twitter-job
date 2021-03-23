<?php

namespace Tests\Unit\Resources;

use App\Http\Resources\TweetResource;
use App\Models\Follower;
use App\Models\Tweet;
use App\Models\User;
use Tests\TestCase;

class TweetResourceTest extends TestCase
{
    /** @test */
    public function a_tweet_resources_must_have_the_necesary_fields()
    {
        $user = User::factory()->create(['name' => 'Alfredo']);
        $efrain = User::factory()->create(['name' => 'Efrain']);

        Follower::factory()->create(['user_id'=>$user->id, 'following_id' => $efrain->id]);

        $tweet = Tweet::factory()->create(['user_id'=>$efrain->id, 'body'=>'e great job']);

        $tweetResource = TweetResource::make($tweet)->resolve();

        $this->assertEquals($tweet->id, $tweetResource['id']);

        $this->assertEquals($tweet->body, $tweetResource['body']);

//        test UserResource
        $this->assertEquals($efrain->username, $tweetResource['user']->username);

        $this->assertEquals($efrain->name, $tweetResource['user']->name);

    }
}
