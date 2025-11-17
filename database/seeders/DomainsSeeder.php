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
            /** @var \Illuminate\Database\Eloquent\Factories\Factory<Domain> $factory */
            $factory = Domain::factory();
            \Webmozart\Assert\Assert::methodExists($factory, 'create', 'Factory must have create method');
            $factory->create($domainData);
        }

        // Create additional random domains for development
        if (app()->environment(['local', 'development'])) {
            /** @var \Illuminate\Database\Eloquent\Factories\Factory<Domain> $factory */
            $factory = Domain::factory();
            \Webmozart\Assert\Assert::methodExists($factory, 'count', 'Factory must have count method');
            \Webmozart\Assert\Assert::methodExists($factory, 'create', 'Factory must have create method');

            /** @var \Illuminate\Database\Eloquent\Factories\Factory<Domain> $countedFactory */
            $countedFactory = $factory->count(5);
            $countedFactory->create();
        }
    }
}
