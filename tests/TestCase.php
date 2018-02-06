<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Artisan;
use DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        Artisan::call('migrate:refresh');
        $this->seed('TestSeeder');
    }


    protected function tearDown()
    {
        Artisan::call('migrate:reset');
        DB::rollBack();
        parent::tearDown();
    }
}
