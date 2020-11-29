<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Product::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'title' => $this->faker->word(),
      'price' => $this->faker->randomFloat(2, 10, 200),
      'user_id' => $this->faker->numberBetween(1, 5),
      'category_id' => $this->faker->numberBetween(1, 6),
      'description' => $this->faker->realText(),
      'image' => '/assets/image/cache/catalog/productsimage/10-1000x1000.jpg',
      'created_at' => $this->faker->dateTime(),
      'updated_at' => $this->faker->dateTime()
    ];
  }
}
