<?php

namespace Gloomy13\NodeSentinel\Classes;

class DOMManipulator {
    private $document;

    public function __construct(string $html) {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        echo'<code>'.__FILE__.':'.__LINE__.'</code>';
        echo '<pre>';
            print_r([$dom]);
        echo '</pre>';
        die;
    }
}