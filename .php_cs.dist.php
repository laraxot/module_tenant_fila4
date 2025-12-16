<?php

declare(strict_types=1);

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
<<<<<<< HEAD
        __DIR__ . '/src',
        __DIR__ . '/tests',
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        __DIR__ . '/src',
        __DIR__ . '/tests',
=======
        __DIR__.'/src',
        __DIR__.'/tests',
>>>>>>> a12f125f4a (.)
=======
        __DIR__ . '/src',
        __DIR__ . '/tests',
>>>>>>> b93ef594b4 (.)
=======
        __DIR__.'/src',
        __DIR__.'/tests',
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> b13ae59 (.)
return new PhpCsFixer\Config()->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => true,
    'trailing_comma_in_multiline' => true,
    'phpdoc_scalar' => true,
    'unary_operator_spaces' => true,
    'binary_operator_spaces' => true,
    'blank_line_before_statement' => [
        'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
    ],
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_var_without_name' => true,
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> b13ae59 (.)
        ],
    ],
    'method_argument_space' => [
        'on_multiline' => 'ensure_fully_multiline',
        'keep_multiple_spaces_after_comma' => true,
    ],
    ,
    'braces' => [
        'position_after_functions_and_oop_constructs' => 'same',
    ],
    'single_trait_insert_per_statement' => true,
])->setFinder($finder);
<<<<<<< HEAD
=======
=======
=======
>>>>>>> origin/develop
return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'not_operator_with_successor_space' => true,
        'trailing_comma_in_multiline' => true,
        'phpdoc_scalar' => true,
        'unary_operator_spaces' => true,
        'binary_operator_spaces' => true,
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_var_without_name' => true,
        'class_attributes_separation' => [
            'elements' => [
                'method' => 'one',
            ],
        ],
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => true,
        ],
        ,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same',
        ],
        'single_trait_insert_per_statement' => true,
    ])
    ->setFinder($finder);
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
        ],
    ],
    'method_argument_space' => [
        'on_multiline' => 'ensure_fully_multiline',
        'keep_multiple_spaces_after_comma' => true,
    ],
    ,
    'braces' => [
        'position_after_functions_and_oop_constructs' => 'same',
    ],
    'single_trait_insert_per_statement' => true,
])->setFinder($finder);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> b13ae59 (.)
