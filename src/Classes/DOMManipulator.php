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
        $this->xpath = $xpath;

        // $classname = 'line-clamp-3 indent-14';
        // $class1 = 'line-clamp-3';
        // $class2 = 'text-black';
        // $id = '568279647528293576-11';

        // $query = "//*[contains(concat(' ', normalize-space(@class), ' '), ' $class1 ')][contains(concat(' ', normalize-space(@class), ' '), ' $class2 ')]";
        // // $query = "//*[contains(concat(' ', normalize-space(@id), ' '), ' $id ')]";

        // $result = $xpath->query($query);

        // echo'<code>'.__FILE__.':'.__LINE__.'</code>';
        // echo '<pre>';
        //     print_r([$result->item(0)->nodeName, $result->item(0)->textContent]);
        // echo '</pre>';
        // die;
    }

    public function getTextContentOnFirstMatch(string $id = '', array $classes = []): string | bool {
        $query = $this->prepareXPathQuery($id, $classes);
        
        $result = $this->xpath->query($query);

        if ($result->count()) {
            return $result->item(0)->textContent;
        }

        return false;
    }

    protected function prepareXPathQuery(string $id = '', array $classes = []): string {
        $query = '//*';

        if (!empty($classes)) {
            foreach ($classes as $class) {
                $query .= "[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]";
            }
        }
        
        if (!empty($id)) {
            $query .= "[contains(normalize-space(@id), '$id')]";
        }

        return $query;
    } 
}