<?php

namespace Gloomy13\NodeSentinel\Commands\Node;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Gloomy13\NodeSentinel\Classes\Logger;

#[AsCommand(
    name: 'node:check',
    description: "Check the node's content"
)]
class CheckCommand extends Command {
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        Logger::log(ROOT_DIR, 'test');
        $output->writeln("Hello from CheckCommand");

        return Command::SUCCESS;
    }
}