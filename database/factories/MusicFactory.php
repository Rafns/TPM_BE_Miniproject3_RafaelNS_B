<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */


class MusicFactory extends Factory
{
       public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence( 3),
            'penyanyi' => $this->faker->name,
            'publication_date' => $this->faker->date(),
            'durasi' => $this->faker->numberBetween(120,360),
            'category_id' => Category::inRandomOrder()->value('id'),

        ];
    }
}
