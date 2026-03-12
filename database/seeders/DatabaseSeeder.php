<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Ticket;
use App\Models\User;
use Database\Factories\TicketFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(['name' => 'read_tickets']);
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('read_tickets');
        User::factory(1)->make()->each(function ($user) {

        $user->assignRole('writer');
        });

        Customer::factory(10)->create();
        Ticket::factory(10)->create();
    }
}
