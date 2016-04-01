<?php

use Illuminate\Database\Seeder;
/**
 * Description of UserTableSeeder
 *
 * @author Maurilio
 */
class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        App\Models\User::truncate();
        factory(App\Models\User::class, 10)->create();
    }

}
