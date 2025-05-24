#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Gloomy13\NodeSentinel\Commands\Node\CheckCommand;
use Gloomy13\NodeSentinel\Commands\Node\AddCommand;

define('', __DIR__);

$application = new Application();

// commands
$application->add(new CheckCommand());
$application->add(new AddCommand());

$application->run();

echo 'App is running';
