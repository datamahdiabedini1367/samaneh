<?php

namespace Database\Seeders;

use App\Models\AccountType;
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
        // \App\Models\User::factory(10)->create();
        Schema::disableForeignKeyConstraints();
        $this->call([
            UsersTableSeeder::class,
            ProjectsTableSeeder::class,
            CompaniesTableSeeder::class,
            PersonsTableSeeder::class,
            IndividualTableSeeder::class,
            AccountTypeTableSeeder::class,
            PermissonTableSeeder::class,
            AdminSeeder::class
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
