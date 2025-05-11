<?php

namespace Gloomy13\NodeSentinel\Commands\Node;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: "node:check",
    description: "Check the node's content"
)]
class CheckCommand extends Command {
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Hello from CheckCommand");

        return Command::SUCCESS;
    }
}