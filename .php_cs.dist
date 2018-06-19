<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath('config')
    ->notPath('build')
    ->notPath('vendor')
    ->in(__DIR__)
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'linebreak_after_opening_tag' => true,
        'not_operator_with_successor_space' => true,
        'no_unused_imports' => false,
        'ordered_imports' => true,
        'phpdoc_order' => true,
    ])->setFinder($finder);
