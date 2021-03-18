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
    public function a_user_belongs_to_many_following()
    {
        $user = User::factory()->create();

        $user->following()->save(
            Follower::factory()->create()
        );

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $user->following);
    }

    /** @test */
    public function a_user_belongs_to_many_followers()
    {
        $user = User::factory()->create();

        $user->followers()->save(
            Follower::factory()->create()
        );

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $user->followers
        );
    }

}
