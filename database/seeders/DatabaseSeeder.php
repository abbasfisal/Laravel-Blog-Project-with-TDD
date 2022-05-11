<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->createUser();
        $this->createCategory();
        $this->createTag();

        Schema::enableForeignKeyConstraints();
    }

    private function createUser(): void
    {
        User::query()->truncate();
        $this->call(UserTableSeeder::class);
    }

    private function createCategory(): void
    {
        Category::factory(10)->create();
        $this->command->info('---*** Categories Table Just Filled');
    }

    private function createTag(): void
    {
        Tag::factory(10)->create();
        $this->command->info('---*** Tags Table Just Filled');

    }
}
