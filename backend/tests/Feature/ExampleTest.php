<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertViewIs('spa.app')
            ->assertSee('近くの移動販売車、出店キッチンカーを探す');
    }
}
