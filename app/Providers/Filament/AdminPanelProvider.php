<?php

declare(strict_types=1);

namespace Modules\Tenant\Providers\Filament;

<<<<<<< HEAD
use Override;
=======
>>>>>>> 15079c8 (.)
use Filament\Panel;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Tenant';

<<<<<<< HEAD
    #[Override]
=======
>>>>>>> 15079c8 (.)
    public function panel(Panel $panel): Panel
    {
        return parent::panel($panel);
    }
}
