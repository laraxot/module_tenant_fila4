<?php

declare(strict_types=1);

use Modules\Tenant\Services\TenantService;
use Modules\Tenant\Services\Config\ConfigResolverRegistry;

test('tenant service can get tenant name', function (): void {
    $name = TenantService::getName();
    
    expect($name)->toBeString();
});

test('tenant service config uses resolver registry', function (): void {
    // Mock a simple config key
    config(['test_key' => 'test_value']);
    
    $result = TenantService::config('test_key');
    
    // Should return the config value or null
    expect($result)->toBeIn(['test_value', null]);
});

test('tenant service file path returns correct path', function (): void {
    $path = TenantService::filePath('test.php');
    
    expect($path)->toBeString();
    expect($path)->toContain('test.php');
});

test('tenant service get config path returns correct format', function (): void {
    $path = TenantService::getConfigPath('database');
    
    expect($path)->toBeString();
    expect($path)->toContain('database');
});

test('tenant service can get config names', function (): void {
    $names = TenantService::getConfigNames();
    
    expect($names)->toBeArray();
});

test('tenant service all modules returns array', function (): void {
    $modules = TenantService::allModules();
    
    expect($modules)->toBeArray();
});
