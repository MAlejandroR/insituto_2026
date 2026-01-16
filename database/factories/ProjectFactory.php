<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projects = config("projects");
        $name = array_rand($projects,1);
        return [
            'name' => $name,
            'hours' => $this->faker->randomDigit(),
            'description' => $projects[$name],
            'starting_date' => $this->faker->date(),
            //
        ];
    }
}
