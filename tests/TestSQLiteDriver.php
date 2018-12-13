<?php

namespace Tests;

use Hyn\Tenancy\Contracts\Webserver\DatabaseGenerator;
use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Events\Websites\Created;
use Hyn\Tenancy\Events\Websites\Deleted;
use Hyn\Tenancy\Events\Websites\Updated;

class TestSQLiteDriver implements DatabaseGenerator
{
    public function created(Created $event, array $config, Connection $connection): bool
    {
        return true;
    }

    public function updated(Updated $event, array $config, Connection $connection): bool
    {
        return true;
    }

    public function deleted(Deleted $event, array $config, Connection $connection): bool
    {
        return true;
    }
}