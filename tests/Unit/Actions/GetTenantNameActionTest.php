<?php

declare(strict_types=1);

use Modules\Tenant\Actions\GetTenantNameAction;
use Tests\TestCase;

uses(TestCase::class);

test('get tenant name action returns correct tenant name from server name', function (): void {
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $_SERVER['SERVER_NAME'] = 'myapp.example.com';

    $action = new GetTenantNameAction;
<<<<<<< HEAD
    /** @phpstan-ignore-next-line method.nonObject */
=======
>>>>>>> 0f9bf43 (.)
    $result = $action->execute();

    expect($result)->toBe('com/example/myapp');
});

test('get tenant name action handles www prefix correctly', function (): void {
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $_SERVER['SERVER_NAME'] = 'www.myapp.example.com';

    $action = new GetTenantNameAction;
<<<<<<< HEAD
    /** @phpstan-ignore-next-line method.nonObject */
=======
>>>>>>> 0f9bf43 (.)
    $result = $action->execute();

    expect($result)->toBe('com/example/myapp');
});

test('get tenant name action falls back to default when server name is localhost', function (): void {
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    $_SERVER['SERVER_NAME'] = '127.0.0.1';

    $action = new GetTenantNameAction;
<<<<<<< HEAD
    /** @phpstan-ignore-next-line method.nonObject */
=======
>>>>>>> 0f9bf43 (.)
    $result = $action->execute();

    expect($result)->toBe('localhost');
});

test('get tenant name action uses app url config when server name not set', function (): void {
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    unset($_SERVER['SERVER_NAME']);
    config(['app.url' => 'https://myapp.test']);

    $action = new GetTenantNameAction;
<<<<<<< HEAD
    /** @phpstan-ignore-next-line method.nonObject */
=======
>>>>>>> 0f9bf43 (.)
    $result = $action->execute();

    expect($result)->toBe('test/myapp');
});

test('get tenant name action handles empty app url config', function (): void {
    /** @phpstan-ignore-next-line offsetAccess.nonOffsetAccessible */
    unset($_SERVER['SERVER_NAME']);
    config(['app.url' => '']);

    $action = new GetTenantNameAction;
<<<<<<< HEAD
    /** @phpstan-ignore-next-line method.nonObject */
=======
>>>>>>> 0f9bf43 (.)
    $result = $action->execute();

    expect($result)->toBe('localhost');
});
