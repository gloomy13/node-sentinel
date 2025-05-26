<?php

namespace Gloomy13\NodeSentinel\Commands\Node;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Gloomy13\NodeSentinel\Classes\Logger;
use Gloomy13\NodeSentinel\Controllers\RequestController;
use Gloomy13\NodeSentinel\Classes\DOMManipulator;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(
    name: 'node:check',
    description: "Check the node's content"
)]
class CheckCommand extends Command {
    protected function configure(): void {
        $this->addArgument(
            'url',
            InputArgument::REQUIRED,
            'Webpage URL address'
        );
        $this->addArgument(
            'selectors',
            InputArgument::REQUIRED,
            'Selectors written in quotation marks. Dot (.) and hash (#) symbols indicate ids and classes. The result node will have to contain id and all classes that are included.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        echo'<code>'.__FILE__.':'.__LINE__.'</code>';
        echo '<pre>';
            print_r([$input->getArguments()]);
        echo '</pre>';
        die;
        $url = $input->getArgument('url');
        $selectors = $input->getArgument('selectors');

        // parse selectors

        $request_controller = new RequestController;
        $response = $request_controller->makeRequest($url);

        $dom_manipulator = new DOMManipulator($response);
        $text = $dom_manipulator->getTextContentOnFirstMatch('', ['line-clamp-3', 'text-black']);

        if (!$text) {
            $text = 'Node sentinel: The node does not exist.';
        }
        else if (empty($text)) {
            $text = 'Node sentinel: The node is empty.';
        }

        $output->writeln($text);

        return Command::SUCCESS;
    }
}