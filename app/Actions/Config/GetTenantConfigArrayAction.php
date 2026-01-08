<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Config;

<<<<<<< HEAD
use Throwable;
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
use Throwable;
=======
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> ffece382 (.)

class GetTenantConfigArrayAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(string $name): array
    {
        $path = app(GetTenantFilePathAction::class)->execute($name.'.php');

        try {
            /** @var mixed $data */
            $data = File::getRequire($path);
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> ffece382 (.)
            $data = [];
        }

        if (! \is_array($data)) {
            $data = [];
        }

        /** @var array<string, mixed> $dataArray */
        $dataArray = $data;

        return $dataArray;
    }
}
