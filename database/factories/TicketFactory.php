<?php

namespace Database\Factories;

use App\Models\Category;
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
        return [
            'theme' => fake()->city(),
            'phone' => fake()->phoneNumber(),
            'status' => 'new',
            'text' => fake()->text(),
            'customer_id' => fake(Customer::class),

        ];
    }
}
