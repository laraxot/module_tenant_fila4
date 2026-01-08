<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Markdown;

<<<<<<< HEAD
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Illuminate\Support\Arr;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
=======
use Illuminate\Support\Arr;
>>>>>>> ffece382 (.)
use Spatie\QueueableAction\QueueableAction;

class GetLocalizedMarkdownPathAction
{
    use QueueableAction;

    public function execute(string $name): string
    {
        $lang = app()->getLocale();

        $paths = [
<<<<<<< HEAD
            app(GetTenantFilePathAction::class)->execute('lang/'.$lang.'/'.$name),
            app(GetTenantFilePathAction::class)->execute($name),
=======
            app(\Modules\Tenant\Actions\Config\GetTenantFilePathAction::class)->execute('lang/'.$lang.'/'.$name),
            app(\Modules\Tenant\Actions\Config\GetTenantFilePathAction::class)->execute($name),
>>>>>>> ffece382 (.)
        ];

        /** @var string|false|null $path */
        $path = Arr::first($paths, static fn (string $path): bool => file_exists($path));

        if (! \is_string($path)) {
            return '#';
        }

        return $path;
    }
}
