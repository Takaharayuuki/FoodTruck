<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(5),
            'comment' => $this->faker->text(20),
            'rate' => $this->faker->randomDigitNot(6, 7, 8, 9),
            'reviewDt' => '2021-10-28',
            'user_name' => $this->faker->kanaName('male'),
        ];
    }
}
