<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 10/12/18
 * Time: 12:09 PM
 */

namespace App\Libraries\Tenancy;


use Hyn\Tenancy\Contracts\Website;
use Hyn\Tenancy\Generators\Uuid\ShaGenerator;
use Illuminate\Support\Facades\App;

class EnvAwareShaGenerator extends ShaGenerator
{

    /**
     * @param Website $website
     * @return string
     */
    public function generate(Website $website) : string
    {
       $string=App::environment('testing')?  substr_replace( parent::generate($website),'testing',0,7): parent::generate($website);
       return $string;
    }

}