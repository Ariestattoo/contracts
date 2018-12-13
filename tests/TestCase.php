<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        if (env('APP_ENV')==='testing') {
           // echo 'Testing Environment Verified';
        }
        else {
            dd('what');
        }
        parent::setUp();

    }

}
