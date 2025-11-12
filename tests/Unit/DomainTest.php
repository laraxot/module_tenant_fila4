<?php

declare(strict_types=1);

use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;
use Tests\TestCase;

uses(TestCase::class);

test('domain model can be instantiated', function (): void {
    $domain = new Domain;

    expect($domain)->toBeInstanceOf(Domain::class);
});

test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
<<<<<<< HEAD
    $this->mock(GetDomainsArrayAction::class, function ($mock) {
        $mock
            ->shouldReceive('execute')
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'test-domain.com'],
                ['id' => 2, 'name' => 'example.org'],
            ]);
    });
=======
    $mockAction = $this->mock(GetDomainsArrayAction::class);
    $mockAction
        ->shouldReceive('execute')
        ->twice()
        ->andReturn([
            ['id' => 1, 'name' => 'test-domain.com'],
            ['id' => 2, 'name' => 'example.org'],
        ]);
>>>>>>> ef186e5 (.)

    $domain = new Domain;
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
});
