<?php

declare(strict_types=1);

use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Mockery;
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;

uses(TestCase::class);

<<<<<<< HEAD
<<<<<<< HEAD
test('domain model can be instantiated', function (): void {
=======
beforeEach(function () {
    // Setup per i test
});

afterEach(function () {
    Mockery::close();
});

it('domain model can be instantiated', function () {
>>>>>>> 15079c8 (.)
=======
test('domain model can be instantiated', function (): void {
>>>>>>> 764bbef (.)
    $domain = new Domain();

    expect($domain)->toBeInstanceOf(Domain::class);
});

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
    $mockAction = $this->mock(GetDomainsArrayAction::class);
    $mockAction
        ->shouldReceive('execute')
        ->twice()
<<<<<<< HEAD
=======
it('get rows method works correctly', function () {
    // Mock della Action GetDomainsArrayAction
    $mockAction = Mockery::mock(GetDomainsArrayAction::class);
    $mockAction->shouldReceive('execute')
        ->once()
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
        ->andReturn([
            ['id' => 1, 'name' => 'test-domain.com'],
            ['id' => 2, 'name' => 'example.org'],
        ]);

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
<<<<<<< HEAD
=======
    $this->app->instance(GetDomainsArrayAction::class, $mockAction);

    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray()
        ->toHaveCount(2)
        ->and($rows[0]['name'])->toBe('test-domain.com')
        ->and($rows[1]['name'])->toBe('example.org');
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
});
