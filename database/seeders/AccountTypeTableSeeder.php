<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Seeder;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountType::query()->insert([
            ['title' =>'اینستاگرام'],
            ['title' =>'واتس آپ '],
            ['title' =>'LinkIn'],
            ['title' =>'Ip'],
        ]);
    }
}
