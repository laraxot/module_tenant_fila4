<?php

declare(strict_types=1);

<<<<<<< HEAD
use Tests\TestCase;
=======
<<<<<<< HEAD
use Tests\TestCase;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Mockery;
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Modules\Tenant\Models\Domain;

uses(TestCase::class);

<<<<<<< HEAD
test('domain model can be instantiated', function (): void {
=======
<<<<<<< HEAD
<<<<<<< HEAD
test('domain model can be instantiated', function (): void {
=======
=======
use Modules\Tenant\Models\Domain;
use Modules\Tenant\Actions\Domains\GetDomainsArrayAction;
use Mockery;

uses(\Tests\TestCase::class);

>>>>>>> origin/develop
beforeEach(function () {
    // Setup per i test
});

afterEach(function () {
    Mockery::close();
});

it('domain model can be instantiated', function () {
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
test('domain model can be instantiated', function (): void {
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
    $domain = new Domain();

    expect($domain)->toBeInstanceOf(Domain::class);
});

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
    $mockAction = $this->mock(GetDomainsArrayAction::class);
    $mockAction
        ->shouldReceive('execute')
        ->twice()
<<<<<<< HEAD
=======
=======
=======
    $domain = new Domain();
    
    expect($domain)->toBeInstanceOf(Domain::class);
});

>>>>>>> origin/develop
it('get rows method works correctly', function () {
    // Mock della Action GetDomainsArrayAction
    $mockAction = Mockery::mock(GetDomainsArrayAction::class);
    $mockAction->shouldReceive('execute')
        ->once()
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
test('get rows method works correctly', function (): void {
    // Mock della Action GetDomainsArrayAction
    $mockAction = $this->mock(GetDomainsArrayAction::class);
    $mockAction
        ->shouldReceive('execute')
        ->twice()
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
        ->andReturn([
            ['id' => 1, 'name' => 'test-domain.com'],
            ['id' => 2, 'name' => 'example.org'],
        ]);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
    $this->app->instance(GetDomainsArrayAction::class, $mockAction);

    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray()
        ->toHaveCount(2)
        ->and($rows[0]['name'])->toBe('test-domain.com')
        ->and($rows[1]['name'])->toBe('example.org');
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    $domain = new Domain();
    $rows = $domain->getRows();

    expect($rows)->toBeArray();
    expect($rows)->toHaveCount(2);
    expect($rows[0]['name'])->toBe('test-domain.com');
    expect($rows[1]['name'])->toBe('example.org');
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
});
