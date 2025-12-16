<?php

declare(strict_types=1);

use Modules\Tenant\Services\Config\Resolvers\DatabaseConfigResolver;
use Nwidart\Modules\Facades\Module;

test('database resolver can resolve database key', function (): void {
    $resolver = new DatabaseConfigResolver();
    
    expect($resolver->canResolve('database'))->toBeTrue();
});

test('database resolver cannot resolve non-database keys', function (): void {
    $resolver = new DatabaseConfigResolver();
    
    expect($resolver->canResolve('app.name'))->toBeFalse();
    expect($resolver->canResolve('morph_map.user'))->toBeFalse();
});

test('database resolver returns null for non-array config', function (): void {
    $resolver = new DatabaseConfigResolver();
    
    $result = $resolver->resolve('database', 'string_value');
    
    expect($result)->toBeNull();
});

test('database resolver handles array config', function (): void {
    $resolver = new DatabaseConfigResolver();
    
    $config = [
        'default' => 'mysql',
        'connections' => [
            'mysql' => [
                'driver' => 'mysql',
                'host' => 'localhost',
            ],
        ],
    ];
    
    $result = $resolver->resolve('database', $config);
    
    expect($result)->toBeArray();
    expect($result)->toHaveKey('default');
    expect($result)->toHaveKey('connections');
});

test('database resolver adds module connections', function (): void {
    Module::shouldReceive('toCollection')
        ->once()
        ->andReturn(collect([
            (object)['getSnakeName' => fn() => 'test_module'],
        ]));
    
    $resolver = new DatabaseConfigResolver();
    
    $config = [
        'default' => 'mysql',
        'connections' => [
            'mysql' => [
                'driver' => 'mysql',
                'host' => 'localhost',
            ],
        ],
    ];
    
    $result = $resolver->resolve('database', $config);
    
    expect($result)->toBeArray();
    expect($result['connections'])->toHaveKey('test_module');
});
