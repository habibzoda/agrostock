<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = News::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'photo' => '/assets/image/cache/catalog/blog/8-870x500.jpg',
      'title' => $this->faker->words(4, true),
      'text' => $this->faker->paragraph(10),
      'created_at' => $this->faker->dateTime(),
      'updated_at' => $this->faker->dateTime(),
    ];
  }
}
