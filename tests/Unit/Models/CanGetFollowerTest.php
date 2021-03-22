<?php

namespace Tests\Unit\Models;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class CanGetFollowerTest extends TestCase
{
    /** @test */
    public function followers_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('followers', [
            'id', 'user_id', 'following_id'
            ])
        );
    }

    /** @test */
    public function a_user_can_belong_to_many_following()
    {
        $alfredo = User::factory()->create(['name' => 'Alfredo']);
        $efrain = User::factory()->create(['name' => 'Efrain']);
        $moises = User::factory()->create(['name' => 'Moises']);
        $isac = User::factory()->create(['name' => 'Isac']);

        // Alfredo following to Efrain Moises Isac
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $efrain->id]);
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $moises->id]);
        Follower::factory()->create(['user_id'=>$alfredo->id, 'following_id' => $isac->id]);
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $alfredo->following);

        $this->assertEquals(3, $alfredo->following->count());
    }

    /** @test */
    public function a_user_can_belong_to_many_followers()
    {
        $alfredo = User::factory()->create(['name' => 'Alfredo']);
        $efrain = User::factory()->create(['name' => 'Efrain']);
        $moises = User::factory()->create(['name' => 'Moises']);
        $isac = User::factory()->create(['name' => 'Isac']);

        // Alfredo has three followers who are efrain moises isac
        Follower::factory()->create(['following_id' => $alfredo->id, 'user_id'=>$efrain->id]);
        Follower::factory()->create(['following_id' => $alfredo->id, 'user_id'=>$moises->id]);
        Follower::factory()->create(['following_id' => $alfredo->id, 'user_id'=>$isac->id]);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $alfredo->followers);

        $this->assertEquals(3, $alfredo->followers->count());
    }
}
