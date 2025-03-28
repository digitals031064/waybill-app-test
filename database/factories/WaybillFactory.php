<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Waybill>
 */
class WaybillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'waybill_no' => strtoupper(Str::random(10)),
            'consignee_id' => $this->faker->numberBetween(1, 10),
            'shipper_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'shipment' => $this->faker->word . ' - ' . $this->faker->word,
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'cbm' => $this->faker->randomFloat(1, 0.5, 10),
            'status' => $this->faker->randomElement(['Pending', 'In Transit', 'Delivered']),
        ];
    }
}
