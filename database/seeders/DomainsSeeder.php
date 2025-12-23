<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Modules\Tenant\Models\Domain;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> laraxot/develop

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
                'domain' => '<nome modulo>.localhost',
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
            /** @var Factory<Domain> $factory */
            $factory = Domain::factory();
<<<<<<< HEAD
            Assert::methodExists($factory, 'create', 'Factory must have create method');
=======
            if (! method_exists($factory, 'create')) {
                throw new \InvalidArgumentException('Factory must have create method');
            }
>>>>>>> laraxot/develop
            $factory->create($domainData);
        }

        // Create additional random domains for development
        if (app()->environment(['local', 'development'])) {
            /** @var Factory<Domain> $factory */
            $factory = Domain::factory();
<<<<<<< HEAD
            Assert::methodExists($factory, 'count', 'Factory must have count method');
            Assert::methodExists($factory, 'create', 'Factory must have create method');
=======
            if (! method_exists($factory, 'count')) {
                throw new \InvalidArgumentException('Factory must have count method');
            }
            if (! method_exists($factory, 'create')) {
                throw new \InvalidArgumentException('Factory must have create method');
            }
>>>>>>> laraxot/develop

            /** @var Factory<Domain> $countedFactory */
            $countedFactory = $factory->count(5);
            $countedFactory->create();
        }
    }
}
