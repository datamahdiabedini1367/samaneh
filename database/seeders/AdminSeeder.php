<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->truncate();
//        Permission::query()->truncate();
        $admin = Role::query()->create([
            'title' => 'admin',
        ]);

        $admin->permissions()->detach(Permission::all());

        $admin->permissions()->attach(Permission::all());


//        User::query()->insert([
//            'role_id' => $admin->id,
//            'username' => 'admin',
//            'is_active' => true,
//            'password' =>bcrypt('12345678'),
//
//        ]);
    }
}
