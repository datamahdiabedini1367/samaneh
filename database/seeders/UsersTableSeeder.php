<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        $fakePosts = UserFactory::new()->count(20)->create();

    }


}
