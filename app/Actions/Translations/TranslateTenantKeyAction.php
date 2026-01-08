<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Translations;

<<<<<<< HEAD
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
=======
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
>>>>>>> ffece382 (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class TranslateTenantKeyAction
{
    use QueueableAction;

    public function execute(string $key): string
    {
        $lang = app()->getLocale();

        $transFile = Str::of($key)
            ->before('.')
            ->append('.php')
            ->toString();

        $arrayKey = Str::of($key)->after('.')->toString();

<<<<<<< HEAD
        $path = app(GetTenantFilePathAction::class)->execute('lang/'.$lang.'/'.$transFile);
=======
        $path = app(\Modules\Tenant\Actions\Config\GetTenantFilePathAction::class)->execute('lang/'.$lang.'/'.$transFile);
>>>>>>> ffece382 (.)
        if (! File::exists($path)) {
            return $key;
        }

        /** @var mixed $data */
        $data = File::getRequire($path);
        Assert::isArray($data);

        /** @var array<string, mixed> $arrayData */
        $arrayData = $data;

        /** @var mixed $res */
        $res = Arr::get($arrayData, $arrayKey);

        if (! \is_string($res)) {
            return $key;
        }

        return $res;
    }
}
