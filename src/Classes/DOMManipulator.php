<?php

namespace Gloomy13\NodeSentinel\Classes;

class DOMManipulator {
    private \DOMDocument $dom;
    private \DOMXPath $xpath;

    public function __construct(string $html) {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);

        $this->dom = $dom;

        $xpath = new \DOMXPath($dom);

        $classname = 'line-clamp-3 indent-14 text-[15px]/[18px] font-bold text-black dark:text-white';
        $id = '568279647528293576-11';
        // $query = "//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]";
        $query = "//*[contains(concat(' ', normalize-space(@id), ' '), ' $id ')]";

        $result = $xpath->query($query);

        echo'<code>'.__FILE__.':'.__LINE__.'</code>';
        echo '<pre>';
            print_r([$result->item(0)->nodeName, $result->item(0)->textContent]);
        echo '</pre>';
        die;
    }

    public function get_text_content(string $id, array $classes) {}
}