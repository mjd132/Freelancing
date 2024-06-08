<?php

namespace Database\Factories;

use App\Enums\proposalStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory
 * <\App\Models\Model>
 */
class proposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(ProposalStatus::values());
        return [
            'project_id' => $this->faker->numberBetween(1, 10),
            'freelancer_id' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(10000, 10000000),
            'status' => $status,
            'description' => $this->faker->realText(),
            'delivery_time'=> $this->faker->dateTimeBetween('now', '+2 months'),
            'accepted_at'=> $status ==proposalStatus::ACCEPTED ? $this->faker->dateTimeBetween('now','+1 month') : null,
        ];
    }
}
