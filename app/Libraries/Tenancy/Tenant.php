<?php

namespace App\Libraries\Tenancy;

use Hyn\Tenancy\Environment;
use App\Models\User;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

/**
 * @property User user
 * @property Website website
 * @property Hostname hostname
 * @property User admin
 */
class Tenant
{


    public function __construct(User $user, Website $website = null, Hostname $hostname = null)
    {
        $this->user = $user;
        $this->website = $website ?? $user->websites->first();
        $this->hostname = $hostname ?? $user->hostnames->first();
    }

    public function delete()
    {
        app(HostnameRepository::class)->delete($this->hostname, true);
        app(WebsiteRepository::class)->delete($this->website, true);
    }

    public static function CreateTenant(User $user, $name): Tenant
    {
 //       DB::beginTransaction();
        // associate the user with a website
        $website = new Website;
        $website->user_id = $user->id;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
       // $baseUrl = config('app.url_base');
        $hostname->fqdn = $name;
        app(HostnameRepository::class)->attach($hostname, $website);
        // make hostname current
        app(Environment::class)->hostname($hostname);
  //      DB::commit();
        return new Tenant($user, $website, $hostname);
    }

}