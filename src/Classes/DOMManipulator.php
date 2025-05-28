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
    }

    public function getTextContentOnFirstMatch(string $id = '', array $classes = []): string | bool {
        $query = $this->prepareXPathQuery($id, $classes);
        
        $result = $this->xpath->query($query);

        if ($result->count()) {
            return trim($result->item(0)->textContent);
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