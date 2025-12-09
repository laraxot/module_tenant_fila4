<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
use Tests\TestCase;
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;

uses(TestCase::class);
<<<<<<< HEAD
=======
=======
use Modules\Tenant\Models\Domain;

uses(Tests\TestCase::class);
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)

test('domain model can be instantiated', function (): void {
    $domain = new Domain();

    expect($domain)->toBeInstanceOf(Domain::class);
});

test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
<<<<<<< HEAD
    $this->mock(GetDomainsArrayAction::class, function ($mock) {
        $mock
            ->shouldReceive('execute')
=======
<<<<<<< HEAD
    $this->mock(GetDomainsArrayAction::class, function ($mock) {
<<<<<<< HEAD
<<<<<<< HEAD
        $mock
            ->shouldReceive('execute')
=======
        $mock->shouldReceive('execute')
>>>>>>> a12f125f4a (.)
=======
        $mock
            ->shouldReceive('execute')
>>>>>>> b93ef594b4 (.)
=======
    $this->mock(\Modules\Tenant\Actions\Domains\GetDomainsArrayAction::class, function ($mock) {
        $mock->shouldReceive('execute')
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'test-domain.com'],
                ['id' => 2, 'name' => 'example.org'],
            ]);
    });

    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
});
