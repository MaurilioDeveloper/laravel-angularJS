<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           App\Models\Project::truncate();
           factory(App\Models\Project::class, 10)->create();
    }
}
