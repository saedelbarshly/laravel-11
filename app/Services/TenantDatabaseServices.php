<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PSpell\Config;

class TenantDatabaseServices
{
    public function createDB($name)
    {
        DB::statement("CREATE DATABASE" . $name);
    }

    public function connectToDB($tenant){
        Config::set('database.connections.tenant.database',$tenant);
        DB::purge('tenant');
        DB::reconnect('tenant');
        Config::set('database.default',$tenant);
    }
    public function migrateDB($tenant){
       Artisan::call('migrate',[
        '--path' => 'database/migration/tenants'
       ]);
    }
}
