<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $pass = Hash::make('12345678');
        User::query()->create([
            'role_id'=>1,
            'username'=>'admin',
             'is_active'=>1,
             'password'=>$pass,
        ]);
       // $fakePosts = UserFactory::new()->count(20)->create();

    }


}
