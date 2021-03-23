<?php

namespace Tests\Feature;

use App\Models\Follower;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListTweetsTest extends TestCase
{
    /** @test */
    public function can_get_all_tweets()
    {
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

        $response = $this->actingAs($alfredo)->getJson(route('timeline'));
        $response->assertSuccessful();

        $response->assertJson([
            'meta' => ['total' => 4]
        ]);

        $response->assertJsonStructure([
            'data', 'links' => ['prev', 'next']
        ]);

        $this->assertEquals(
            $efrain->name,
            $response->json('data.0.user.name')
        );
    }
}
