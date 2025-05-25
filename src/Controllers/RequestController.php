<?php

namespace Gloomy13\NodeSentinel\Controllers;

class RequestController {
    function make_request(string $url) : string|bool {
        $curl_obj = curl_init($url);

        curl_setopt($curl_obj, CURLOPT_RETURNTRANSFER, true);
        
        $data = curl_exec($curl_obj);

        curl_close($curl_obj);

        return $data;
    }
}