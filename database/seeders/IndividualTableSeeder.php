<?php

namespace Database\Seeders;

use App\Models\Individual;
use Illuminate\Database\Seeder;

class IndividualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Individual::query()->truncate();



        Individual::query()->insert([
            ['title' =>'همسر'],
            ['title' =>'فرزند'],
            ['title' =>'پدر'],
            ['title' =>'پدربزرگ'],
            ['title' =>'ناپدری'],
            ['title' =>'مادر'],
            ['title' =>'مادربزرگ'],
            ['title' =>'نامادری'],
            ['title' =>'برادر'],
            ['title' =>'برادرتنی'],
            ['title' =>'خواهر'],
            ['title' =>'خواهرتنی'],
            ['title' =>'عمه'],
            ['title' =>'دایی'],
            ['title' =>'خاله'],
            ['title' =>'عمو'],
            ['title' =>'دوست'],
            ['title' =>'همرزم'],
            ['title' =>'شاگرد'],
            ['title' =>'معلم'],
            ['title' =>'استاد'],
            ['title' =>'دکتر'],
            ]);



    }
}
