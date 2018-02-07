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
        // make sure to first seed the markets and countries tables,
        // so the property objects will have required foreign keys assigned.
        factory(App\Market::class, 5)->create();
        factory(App\Country::class, 5)->create();
        factory(App\Property::class, 10)->create();
    }
}
