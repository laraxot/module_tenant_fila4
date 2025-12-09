<?php

declare(strict_types=1);

namespace Modules\Tenant\Console\Commands;

use Illuminate\Console\Command;
use Modules\Tenant\Services\TenantService;

class TestCommand extends Command
{
    /** @var string */
    protected $signature = 'tenant:test';

    /** @var string */
    protected $description = 'Check Tenant';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $name = TenantService::getName();
<<<<<<< HEAD
        $this->info('tenant name :' . $name);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->info('tenant name :' . $name);
=======
        $this->info('tenant name :'.$name);
>>>>>>> a12f125f4a (.)
=======
        $this->info('tenant name :' . $name);
>>>>>>> b93ef594b4 (.)
=======
        $this->info('tenant name :'.$name);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    }
}
