<?php

declare(strict_types=1);

use Tests\TestCase;
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;

uses(TestCase::class);

test('domain model can be instantiated', function (): void {
<<<<<<< HEAD
    $domain = new Domain();
=======
    $domain = new Domain;
>>>>>>> 754a996 (.)

    expect($domain)->toBeInstanceOf(Domain::class);
});

test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
    $this->mock(GetDomainsArrayAction::class, function ($mock) {
<<<<<<< HEAD
        $mock
            ->shouldReceive('execute')
=======
        $mock->shouldReceive('execute')
>>>>>>> 754a996 (.)
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'test-domain.com'],
                ['id' => 2, 'name' => 'example.org'],
            ]);
    });

<<<<<<< HEAD
    $domain = new Domain();
=======
    $domain = new Domain;
>>>>>>> 754a996 (.)
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
});
