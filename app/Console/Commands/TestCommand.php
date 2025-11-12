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
<<<<<<< HEAD
<<<<<<< HEAD
    public function handle(): void
    public function handle()
>>>>>>> f057083 (.)
=======
    public function handle()
>>>>>>> fafcd56 (.)
=======
    public function handle()
>>>>>>> 754a996 (.)
    {
        $name = TenantService::getName();
        $this->info('tenant name :'.$name);
    }
}
