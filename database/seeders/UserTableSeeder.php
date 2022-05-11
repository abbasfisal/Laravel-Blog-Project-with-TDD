<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    use RefreshDatabase;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createNormallUser();

    }

    private function createAdmin(): void
    {
        $admin = User::factory()->admin()->create([
            User::col_email => 'admin@a.b',
            User::col_password => Hash::make('1234')
        ]);

        $this->command->info('---*** Admin Created SuccessFully');
    }

    private function createNormallUser(): void
    {
        $user = User::factory()->user()->create([
            User::col_email => 'user@a.b',
            User::col_password => Hash::make('1234')
        ]);


        $this->command->info('---*** User Created SuccessFully');
    }
}
