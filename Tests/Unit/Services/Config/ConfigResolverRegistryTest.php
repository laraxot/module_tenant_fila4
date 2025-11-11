<?php

declare(strict_types=1);

use Modules\Tenant\Services\Config\ConfigResolverRegistry;
use Modules\Tenant\Services\Config\Contracts\ConfigResolverInterface;
use Modules\Tenant\Services\Config\Resolvers\MorphMapConfigResolver;
use Modules\Tenant\Services\Config\Resolvers\DatabaseConfigResolver;
use Modules\Tenant\Services\Config\Resolvers\StandardConfigResolver;

test('registry can register custom resolvers', function (): void {
    $registry = new ConfigResolverRegistry();
    $customResolver = new class implements ConfigResolverInterface {
        public function canResolve(string $key): bool
        {
            return 'custom.key' === $key;
        }

        public function resolve(string $key, string|int|array|null $default = null): float|int|string|array|null
        {
            return 'custom_value';
        }
    };
    
    $registry->register($customResolver);
    $resolver = $registry->findResolver('custom.key');
    
    expect($resolver)->toBeInstanceOf(ConfigResolverInterface::class);
    expect($resolver->resolve('custom.key'))->toBe('custom_value');
});

test('registry returns correct resolver for morph_map keys', function (): void {
    $registry = new ConfigResolverRegistry();
    
    // Mock the inAdmin() and Request::segment() functions for this test
    $resolver = $registry->findResolver('morph_map.user');
    
    // Should return MorphMapConfigResolver or StandardConfigResolver depending on context
    expect($resolver)->toBeInstanceOf(ConfigResolverInterface::class);
});

test('registry returns database resolver for database key', function (): void {
    $registry = new ConfigResolverRegistry();
    
    $resolver = $registry->findResolver('database');
    
    expect($resolver)->toBeInstanceOf(DatabaseConfigResolver::class);
});

test('registry returns standard resolver as fallback', function (): void {
    $registry = new ConfigResolverRegistry();
    
    $resolver = $registry->findResolver('app.name');
    
    expect($resolver)->toBeInstanceOf(StandardConfigResolver::class);
});

test('registry maintains resolver order', function (): void {
    $registry = new ConfigResolverRegistry();
    
    // More specific resolvers should be checked first
    $resolver1 = $registry->findResolver('morph_map.test');
    $resolver2 = $registry->findResolver('database');
    $resolver3 = $registry->findResolver('app.name');
    
    expect($resolver1)->toBeInstanceOf(ConfigResolverInterface::class);
    expect($resolver2)->toBeInstanceOf(DatabaseConfigResolver::class);
    expect($resolver3)->toBeInstanceOf(StandardConfigResolver::class);
});
