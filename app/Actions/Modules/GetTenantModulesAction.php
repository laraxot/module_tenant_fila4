<?php

declare(strict_types=1);

namespace Modules\Tenant\Actions\Modules;

<<<<<<< HEAD
use Exception;
use Illuminate\Support\Facades\File;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use Spatie\QueueableAction\QueueableAction;
use Throwable;

use function Safe\json_decode;
=======
use Illuminate\Support\Facades\File;
use Spatie\QueueableAction\QueueableAction;
>>>>>>> ffece382 (.)

class GetTenantModulesAction
{
    use QueueableAction;

    /**
     * @return array<int, string>
     */
    public function execute(): array
    {
<<<<<<< HEAD
        $filePath = app(GetTenantFilePathAction::class)->execute('modules_statuses.json');
=======
        $filePath = app(\Modules\Tenant\Actions\Config\GetTenantFilePathAction::class)->execute('modules_statuses.json');
>>>>>>> ffece382 (.)
        $contents = File::get($filePath);

        try {
            /** @var mixed $json */
<<<<<<< HEAD
            $json = json_decode($contents, true);
        } catch (Throwable $e) {
            throw new Exception($e->getMessage().'['.$filePath.']['.__LINE__.']['.basename(__FILE__).']');
=======
            $json = \Safe\json_decode($contents, true);
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage().'['.$filePath.']['.__LINE__.']['.basename(__FILE__).']');
>>>>>>> ffece382 (.)
        }

        $modules = [];
        if (\is_array($json)) {
            foreach ($json as $name => $enabled) {
                if (! $enabled) {
                    continue;
                }

                if (! \is_string($name)) {
                    continue;
                }

                if (! File::exists(base_path('Modules/'.$name))) {
                    continue;
                }

                $modules[] = $name;
            }
        }

        return $modules;
    }
}
