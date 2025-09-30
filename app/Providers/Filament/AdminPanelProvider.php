<?php

declare(strict_types=1);

namespace Modules\Tenant\Providers\Filament;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
=======
>>>>>>> 15079c8 (.)
=======
use Override;
>>>>>>> 764bbef (.)
use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Tenant';

<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> 15079c8 (.)
=======
    #[Override]
>>>>>>> 764bbef (.)
    public function panel(Panel $panel): Panel
    {
        return parent::panel($panel);
    }
}
