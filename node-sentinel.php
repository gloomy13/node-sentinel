#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Gloomy13\NodeSentinel\Commands\Node\CheckCommand;

$application = new Application();

// commands
$application->add(new CheckCommand());

$application->run();

echo 'App is running';
