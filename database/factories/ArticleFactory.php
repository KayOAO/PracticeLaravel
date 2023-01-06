<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $countUser = User::count();
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, $countUser),
        ];
    }
}