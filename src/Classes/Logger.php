<?php

namespace Gloomy13\NodeSentinel\Classes;

use DateTime;

class Logger {
    const LOGS_DIRECTORY_NAME = 'logs';

   /**
    * @param string $root_directory_path
    * @param string $type (optional) Available types: 'error', 'debug' (default)
    * 
    * @return [type]
    */
    static function log(string $root_directory_path, mixed $value, string $type = 'debug') {
        switch($type)
        {
            case 'debug':
                $filename = 'debug.log';
                break;
            case 'error':
                $filename = 'error.log';
                break;
            default:
                $filename = 'debug.log';
        }

        $fullpath = $root_directory_path . "/" . self::LOGS_DIRECTORY_NAME . "/" . $filename;

        $dirname = dirname($fullpath);

        if(!is_dir($dirname)){
            mkdir($dirname);
        }

        $handle = fopen($fullpath, 'a');
        $date = (new DateTime())->format('Y-m-d H:i:s');

        fwrite($handle, "[$date] DEBUG: $value" . PHP_EOL);

        fclose($handle);
    }
}