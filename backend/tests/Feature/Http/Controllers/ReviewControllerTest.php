<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Response;
use Faker\Factory;
use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;
    use CreatesUserProviders;

    public function test_投稿_正常系()
    {
        $review = Review::factory()->create();
        $user = User::factory()->create();

        $response = $this->getJson("api/reviews/{$review->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'review_id' => $review->id,
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('reviews', [
            'review_id' => $review->id,
            'user_id' => $user->id,
        ]);
    }
}
