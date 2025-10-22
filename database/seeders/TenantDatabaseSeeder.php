<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

<<<<<<< HEAD
        // $this->call("OthersTableSeeder");
=======
        // Seed test domains
        $this->call([
            DomainsSeeder::class,
            TestSushiSeeder::class,
        ]);
>>>>>>> 7e38bd4 (.)
    }
}
