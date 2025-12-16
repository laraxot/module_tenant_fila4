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
     */
    public function handle(): void
<<<<<<< HEAD
=======
    public function handle()
>>>>>>> f057083 (.)
>>>>>>> 62af1b1 (.)
    {
        $name = TenantService::getName();
        $this->info('tenant name :'.$name);
    }
}
