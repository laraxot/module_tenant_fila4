<?php

declare(strict_types=1);

use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;
use Tests\TestCase;

uses(TestCase::class);

test('domain model can be instantiated', function (): void {
<<<<<<< HEAD
    $domain = new Domain;
=======
<<<<<<< HEAD
    $domain = new Domain();
=======
    $domain = new Domain;
>>>>>>> 754a996 (.)
>>>>>>> c527cf5 (.)

    expect($domain)->toBeInstanceOf(Domain::class);
});

test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
    $this->mock(GetDomainsArrayAction::class, function ($mock) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> c527cf5 (.)
        $mock
            ->shouldReceive('execute')
=======
        $mock->shouldReceive('execute')
<<<<<<< HEAD
>>>>>>> 15079c8 (.)
=======
        $mock
            ->shouldReceive('execute')
>>>>>>> 764bbef (.)
=======
>>>>>>> 754a996 (.)
>>>>>>> c527cf5 (.)
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'test-domain.com'],
                ['id' => 2, 'name' => 'example.org'],
            ]);
    });

<<<<<<< HEAD
    $domain = new Domain;
=======
<<<<<<< HEAD
    $domain = new Domain();
=======
    $domain = new Domain;
>>>>>>> 754a996 (.)
>>>>>>> c527cf5 (.)
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
});
