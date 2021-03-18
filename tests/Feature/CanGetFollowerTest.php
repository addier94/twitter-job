<?php

namespace Tests\Feature;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CanGetFollowerTest extends TestCase
{
    /** @test */
//    public function can_get_following()
//    {
//        $user = User::factory()->times(5)->create();
//        $user->each(function ($u) {
//            Follower::create([
//                'user_id' => 1,
//                'following_id' => $u->id
//            ]);
//        });
//
//        $auth_user = $user->first();
//
//        $response = $this->actingAs($auth_user)
//            ->getJson(route('home'));
//
//        $response->assertStatus(200);
//    }
}
