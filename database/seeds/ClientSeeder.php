<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           App\Models\Client::truncate();
           factory(App\Models\Client::class, 10)->create();
    }
}
