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
        $this->createWriter();
        $this->createNormallUser();

    }

    /**
     * create Admin
     *
     */
    private function createAdmin(): void
    {
        $admin = User::factory()->admin()->create([
            User::col_email => 'admin@a.b',
            User::col_password => Hash::make('1234')
        ]);

        $this->command->info('---*** Admin Created SuccessFully');
    }

    /**
     * create Writer
     */
    private function createWriter(): void
    {
        $admin = User::factory()->writer()->create([
            User::col_email => 'writer@a.b',
            User::col_password => Hash::make('1234')
        ]);

        $this->command->info('---*** Writer Created SuccessFully');
    }

    /**
     * create Normall User
     */
    private function createNormallUser(): void
    {
        $user = User::factory()->user()->create([
            User::col_email => 'user@a.b',
            User::col_password => Hash::make('1234')
        ]);


        $this->command->info('---*** User Created SuccessFully');
    }
}
