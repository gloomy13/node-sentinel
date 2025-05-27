<?php

namespace Gloomy13\NodeSentinel\Utils;

class StringHelper {
    public const ID_MODE = 1, CLASS_MODE = 2;

    public static function parseSelectorsArgument(string $selectorsArgumentValue): array {
        $stringArray = str_split($selectorsArgumentValue);

        $selectors = [];

        $tmpSelector = '';
        foreach ($stringArray as $character) {
            if ($character == '.' || $character == '#') {
                if (strlen(trim($tmpSelector))) {
                    $selectors []= trim($tmpSelector);
                    $tmpSelector = '';
                }
            }
            elseif ($character == ' ') {
                if (strlen(trim($tmpSelector))) {
                    $selectors []= trim($tmpSelector);
                    $tmpSelector = '';
                }

                continue;
            }
            elseif (!str_contains($tmpSelector, '.') && !str_contains($tmpSelector, '#')) {
                continue;
            }

            $tmpSelector .= $character;
        }

        if (strlen(trim($tmpSelector))) {
            $selectors []= trim($tmpSelector);
        }

        return $selectors;
    }

    public static function filterSelectors(array $selectors, int $mode) : array {
        $filteredArray = [];
        
        switch ($mode) {
            case self::ID_MODE:
                $filteredArray = array_filter($selectors, function($x) {return str_contains($x, '#');});
                break;
            case self::CLASS_MODE:
                $filteredArray = array_filter($selectors, function($x) {return str_contains($x, '.');});
        }

        $filteredArray = array_map(
            function($x) {
                return str_replace(['#', '.'], '', $x);
            },
            $filteredArray
        );

        return $filteredArray;
    }
}