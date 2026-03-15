<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ticket::class;
    public function definition(): array
    {
        $statuses = ['new', 'in_work', 'done'];
        return [
            'theme' => fake()->city(),
            'status' => $statuses[random_int(0, count($statuses) - 1)],
            'text' => fake()->text(),
            'customer_id' => Customer::all()->random()->id,
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
