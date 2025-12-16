<?php

declare(strict_types=1);

namespace Modules\Tenant\Services;

// use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TenantService.
 */
class TenantService
{
    /**
     * Undocumented function.
     */
    public static function getName(): string
    {
        return app(\Modules\Tenant\Actions\GetTenantNameAction::class)->execute();
    }

    // end function

    /**
     * Undocumented function.
     */
    public static function filePath(string $filename): string
    {
        return app(\Modules\Tenant\Actions\Config\GetTenantFilePathAction::class)->execute($filename);
    }

    // end function
    /**
     * tenant config.
     * ret_old \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed.
     * ret_old1 \Illuminate\Config\Repository|mixed.
     */
    public static function config(string $key, string|int|array|null $default = null): float|int|string|array|null
    {
        return app(\Modules\Tenant\Actions\Config\ResolveTenantConfigValueAction::class)->execute($key, $default);
    }

    public static function getConfigPath(string $key): string
    {
        return app(\Modules\Tenant\Actions\Config\GetTenantConfigPathAction::class)->execute($key);
    }

    public static function getConfig(string $name): array
    {
        return app(\Modules\Tenant\Actions\Config\GetTenantConfigArrayAction::class)->execute($name);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function saveConfig(string $name, array $data): void
    {
        app(\Modules\Tenant\Actions\Config\SaveTenantConfigAction::class)->execute($name, $data);
    }

    /**
     * Undocumented function.
     */
    public static function modelClass(string $name): ?string
    {
        return app(\Modules\Tenant\Actions\Models\ResolveTenantModelClassAction::class)->execute($name);
    }

    /**
     * @throws \ReflectionException
     */
    public static function model(string $name): Model
    {
        return app(\Modules\Tenant\Actions\Models\ResolveTenantModelInstanceAction::class)->execute($name);
    }

    public static function trans(string $key): string
    {
        return app(\Modules\Tenant\Actions\Translations\TranslateTenantKeyAction::class)->execute($key);
    }
}
