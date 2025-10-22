<?php

declare(strict_types=1);

namespace Modules\Tenant\Models;

use Modules\Tenant\Models\Traits\SushiToJsons;

/**
 * Class BaseModelJsons.
 *
<<<<<<< HEAD
 * @property array $form
=======
 * @property array $schema
>>>>>>> 7e38bd4 (.)
 */
abstract class BaseModelJsons extends BaseModel
{
    use SushiToJsons;
}
