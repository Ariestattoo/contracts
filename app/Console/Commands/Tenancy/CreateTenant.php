<?php

namespace App\Console\Commands\Tenancy;

use App\Models\User;
use Illuminate\Console\Command;
use App\Libraries\Tenancy\Tenant;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Tenancy:CreateTenant {hostname} {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $host= $this->argument('hostname');
      $user_id= $this->argument('user');
      $user = User::find($user_id);
      Tenant::CreateTenant($user,$host);
    }
}
