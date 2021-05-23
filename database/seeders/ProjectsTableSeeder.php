<?php

namespace Database\Seeders;

use App\Models\Project;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::query()->truncate();
        $fakePosts = ProjectFactory::new()->count(20)->create();

    }
}
