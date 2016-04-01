<?php

use Illuminate\Database\Seeder;

class ProjectNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           App\Models\ProjectNote::truncate();
           factory(App\Models\ProjectNote::class, 50)->create();
    }
}
