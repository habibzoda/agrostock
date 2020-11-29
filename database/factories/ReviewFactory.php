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
      'user_id' => $this->faker->numberBetween(1, 5),
      'star' => $this->faker->numberBetween(1, 5),
      'text' => $this->faker->realText(),
      'product_id' => $this->faker->numberBetween(1, 60),
      'created_at' => $this->faker->dateTime(),
      'updated_at' => $this->faker->dateTime()
    ];
  }
}
