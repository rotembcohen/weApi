<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the unit test seeds. Allows special test only tinkering.
     * Note too large numbers will hurt test run time.
     * 
     * @return void
     */
    public function run()
    {
        factory(App\Market::class, 5)->create();
        factory(App\Country::class, 5)->create();
        factory(App\Property::class, 3)->create();
    }
}
