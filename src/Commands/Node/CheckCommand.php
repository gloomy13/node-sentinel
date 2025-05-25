<?php

namespace Gloomy13\NodeSentinel\Commands\Node;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Gloomy13\NodeSentinel\Classes\Logger;
use Gloomy13\NodeSentinel\Controllers\RequestController;
use Gloomy13\NodeSentinel\Classes\DOMManipulator;

#[AsCommand(
    name: 'node:check',
    description: "Check the node's content"
)]
class CheckCommand extends Command {
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = 'https://www.wp.pl/';

        $request_controller = new RequestController;
        $response = $request_controller->make_request($url);

        $dom_manipulator = new DOMManipulator($response);

        $output->writeln("Hello from CheckCommand");

        return Command::SUCCESS;
    }
}