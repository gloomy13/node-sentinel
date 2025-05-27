<?php

namespace Gloomy13\NodeSentinel\Utils;

class StringHelper {
    public static function parseSelectorsArgument(string $selectorsArgumentValue): array {
        $stringArray = str_split($selectorsArgumentValue);

        $selectors = [];

        $tmpSelector = '';
        foreach ($stringArray as $character) {
            if ($character == '.' || $character == '#' || $character == ' ') {
                if (!empty(trim($tmpSelector))) {
                    $selectors []= trim($tmpSelector);
                    $tmpSelector = '';
                }
            }
            else {
                if (!str_contains($tmpSelector, '.') && !str_contains($tmpSelector, '#')) continue;
            }

            $tmpSelector .= $character;
        }

        if (!empty(trim($tmpSelector)) && strlen($tmpSelector) > 1) $selectors []= trim($tmpSelector);

        return $selectors;
    }
}