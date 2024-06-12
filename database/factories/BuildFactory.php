<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Build>
 */
class BuildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'year' => '2003',
            'make' => 'BMW',
            'model' => '325',
            'trim' => 'i',
            'build_category' => $this->faker->randomElement(['Drift', 'Euro', 'Lowrider', 'Classic/Antique', 'Offroad/Overlander', 'Exotic']),
            'image' => $this->faker->imageUrl(),
            'hp' => 450,
            'whp' => 0,
            'torque' => 0,
            'weight' => 3219,
            'vehicleLayout' => 'Front Engine RWD',
            'fuel' => 'Flex 93/E85',
            'zeroSixty' => '3.9',
            'zeroOneHundred' => '',
            'quarterMile' => '',
            'engineType' => '2.5L Inline-6',
            'engineCode' => 'M54',
            'forcedInduction' => 'Turbocharged',
            'trans' => '5-speed manual',
            'suspension' => 'Multi-link, MacPherson',
            'brakes' => 'Disc',
            'featured' => false,
        ];
    }
}
