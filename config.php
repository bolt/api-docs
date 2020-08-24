<?php

use Doctum\Doctum;
use Doctum\RemoteRepository\GitHubRemoteRepository;
use Doctum\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$dir = __DIR__ . '/core';

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('tests')
    ->exclude('vendor')
    ->in($dir);

// generate documentation for all v2.0.* tags, the 2.0 branch, and the master one
$versions = GitVersionCollection::create($dir)
    ->add('master', 'master branch');

return new Doctum($iterator, [
    'versions'             => $versions,
    'title'                => 'Bolt 4 API documentation',
    'build_dir'            => __DIR__ . '/build/%version%',
    'cache_dir'            => __DIR__ . '/cache/%version%',
    'remote_repository'    => new GitHubRemoteRepository('bolt/core', $dir),
    'default_opened_level' => 2,
]);
