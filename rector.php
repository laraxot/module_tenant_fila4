<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
use Rector\Laravel\Rector\ClassMethod\RedirectRouteToToRouteHelperRector;
use Rector\Laravel\Set\LaravelSetList;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
<<<<<<< HEAD
=======
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Laravel\Rector\ClassMethod\RedirectRouteToToRouteHelperRector;
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)

return static function (RectorConfig $rectorConfig): void {
    // Paths da analizzare
    safe_object_call($rectorConfig, 'paths', [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
        __DIR__ . '/Actions',
        __DIR__ . '/Casts',
        __DIR__ . '/Facades',
        __DIR__ . '/Models',
<<<<<<< HEAD
=======
        __DIR__.'/Actions',
        __DIR__.'/Casts',
        __DIR__.'/Facades',
        __DIR__.'/Models',
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
    ]);

    // Files e cartelle da ignorare
    safe_object_call($rectorConfig, 'skip', [
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 764bbef (.)
        __DIR__ . '/vendor',
        __DIR__ . '/database',
        __DIR__ . '/resources',
        __DIR__ . '/node_modules',
<<<<<<< HEAD
=======
        __DIR__.'/vendor',
        __DIR__.'/database',
        __DIR__.'/resources',
        __DIR__.'/node_modules',
>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
    ]);

    // Regole specifiche
    safe_object_call($rectorConfig, 'rule', RedirectRouteToToRouteHelperRector::class);

    // Set di regole da applicare
    safe_object_call($rectorConfig, 'sets', [
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::EARLY_RETURN,
        LaravelSetList::LARAVEL_90,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTIONS_TO_STATIC_CALL,
    ]);

    // Importa i nomi
    safe_object_call($rectorConfig, 'importNames');

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
    // define sets of rules
    // $rectorConfig->sets(
    //     [
    //         PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
    //         // SetList::DEAD_CODE,
    //         // SetList::CODE_QUALITY,
    //         LevelSetList::UP_TO_PHP_81,
    //         LaravelSetList::LARAVEL_100,
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 15079c8 (.)
=======
>>>>>>> 764bbef (.)
    //         // SetList::NAMING, //problemi con injuction
    //         SetList::TYPE_DECLARATION,
    //         // SetList::CODING_STYLE,
    //         // SetList::PRIVATIZATION,//problemi con final
    //         // SetList::EARLY_RETURN,
    //         // SetList::INSTANCEOF,
    //     ]
    // );
};
