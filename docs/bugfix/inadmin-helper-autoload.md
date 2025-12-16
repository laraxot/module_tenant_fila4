# Bugfix: `inAdmin()` undefined during `package:discover`

## Symptom

During Composer scripts:

- `Generating optimized autoload files`
- `Illuminate\\Foundation\\ComposerScripts::postAutoloadDump`
- `@php artisan package:discover --ansi`

The process fails with:

- `Call to undefined function Modules\\Tenant\\Services\\inAdmin()`

## Root cause

`TenantService::config()` (and the morph-map resolver) relied on a global helper function `inAdmin()`.

In this codebase the authoritative implementation is `Modules\\Xot\\Services\\RouteService::inAdmin()`.
The `inAdmin()` helper is expected to be a thin wrapper around that service, but during `package:discover` it is **not guaranteed** that helper files are already loaded/available in the current execution context.

As a result, calling `inAdmin()` directly can break Composer automation.

## Fix

- Replace `inAdmin()` calls in the Tenant module with `Modules\\Xot\\Services\\RouteService::inAdmin()`.
- Ensure `TenantService::config()` is safe in CLI contexts by returning early when `app()->runningInConsole()`.

## Files changed

- `Modules/Tenant/app/Services/TenantService.php`
- `Modules/Tenant/app/Services/Config/Resolvers/MorphMapConfigResolver.php`

## Notes

This follows the existing architecture documented in `Modules/Xot/docs/helpers-architecture-analysis.md`:

- Helper functions are convenience wrappers
- Services contain the real logic

In critical bootstrap paths (Composer scripts, service providers, config resolution), prefer the service method instead of relying on helper autoload order.
