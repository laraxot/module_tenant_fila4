<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Tenant\Models\Domain;

class DomainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domains = [
            [
                'domain' => '<nome progetto>.localhost',
                'is_primary' => true,
                'is_ssl_enabled' => false,
                'is_active' => true,
            ],
            [
                'domain' => 'salutemo.localhost',
                'is_primary' => false,
                'is_ssl_enabled' => false,
                'is_active' => true,
            ],
            [
                'domain' => 'demo.<nome progetto>.it',
                'is_primary' => false,
                'is_ssl_enabled' => true,
                'is_active' => false,
            ],
        ];

        foreach ($domains as $domainData) {
            $factory = Domain::factory();
            if (is_object($factory) && method_exists($factory, 'create')) {
                $factory->create($domainData);
            }
        }

        // Create additional random domains for development
        if (app()->environment(['local', 'development'])) {
            $factory = Domain::factory();
            if (is_object($factory) && method_exists($factory, 'count')) {
                $countFactory = $factory->count(5);
                if (is_object($countFactory) && method_exists($countFactory, 'create')) {
                    $countFactory->create();
                }
            }
        }
    }
}
