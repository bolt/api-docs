<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;
use Sami\Version\GitVersionCollection;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('Resources')
    ->exclude('Tests')
    ->in($dir = __DIR__ . '/core')
;

// generate documentation for all v2.0.* tags, the 2.0 branch, and the master one
$versions = GitVersionCollection::create($dir)
    ->add('master', 'master branch')
;

return new Sami($iterator, array(
    'versions'             => $versions,
    'title'                => 'Bolt 4 API documentation',
    'build_dir'            => __DIR__ . '/build/%version%',
    'cache_dir'            => __DIR__ . '/cache/%version%',
    'remote_repository'    => new GitHubRemoteRepository('bolt/core', dirname($dir)),
    'default_opened_level' => 2,
));


