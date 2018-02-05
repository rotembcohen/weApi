<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Market::class, 5)->create();
        factory(App\Country::class, 5)->create();
        factory(App\Property::class, 10)->create();
    }
}
