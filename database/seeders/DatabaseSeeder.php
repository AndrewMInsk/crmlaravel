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
        $permission = Permission::findOrCreate('read_tickets', 'web');
        $role = Role::findOrCreate('manager', 'web');
        $role->givePermissionTo($permission);
        User::factory(2)->create()->each(function ($user) {
            $user->assignRole('manager');
        });

        Customer::factory(20)->create();
        Ticket::factory(20)->create();
    }
}
