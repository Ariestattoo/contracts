<?php

namespace Tests;

use App\Models\User;
use Hyn\Tenancy\Contracts\CurrentHostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Providers\Tenants\RouteProvider;

abstract class TenantAwareTestCase extends TestCase
{
    protected $website;
    protected $hostname;

    protected function setUp()
    {
        parent::setUp();

    //    $this->registerTestDatabaseDriver();
    //    $this->bypassTenantConnectionSettings();

        $this->migrateSystemDatabase();
        [$this->website, $this->hostname] = $this->createTestTenant();

        $this->setTenantDatabaseConnectionConfig();
        $this->setCurrentHostname($this->hostname);
        $this->registerTenantRoutes();
        $this->migrateTenantDatabase();
    }

    protected function migrateSystemDatabase(): void
    {
        $this->artisan('migrate:fresh', [
            // this is a connection name, not a database name!!!
            '--database' => 'system',
            '--force'    => true,
            '--path'     => \database_path('migrations'),
            '--realpath' => true,
        ]);
    }

    protected function migrateTenantDatabase(): void
    {
        $this->artisan('migrate:refresh', [
            // this is a connection name, not a database name!!!
            '--database' => 'tenant',
            '--force'    => true,
            '--path'     => config('tenancy.db.tenant-migrations-path'),
            '--realpath' => true,
            '--seed'    => true,
        ]);
    }

    protected function registerTenantRoutes(): void
    {
        (new RouteProvider(app()))->boot();
    }

    protected function setCurrentHostname(Hostname $hostname): void
    {
        app()->singleton(CurrentHostname::class, function () use ($hostname) {
            return $hostname;
        });
    }

    protected function setTenantDatabaseConnectionConfig(): void
    {
        config([
          'database.connections.tenant' => [
            'driver'   => 'sqlite',
            'database' => ':memory:',
          ],
        ]);
    }

    protected function createTestTenant(): array
    {
        $user = factory(User::class)->create();
        $website = new Website();
        $website->user_id = $user->id;
        app(WebsiteRepository::class)->create($website);

        $hostname = new Hostname();
        $hostname->fqdn = 'testing.example.com';
        $hostname = app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website);

        return [$website, $hostname];
    }

    protected function registerTestDatabaseDriver(): void
    {
        app('tenancy.db.drivers')->put('sqlite', TestSQLiteDriver::class);
    }

    protected function bypassTenantConnectionSettings(): void
    {
        config(['tenancy.db.tenant-division-mode' => 'bypass']);
    }
}
