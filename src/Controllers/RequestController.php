<?php

namespace Gloomy13\NodeSentinel\Controllers;

class RequestController {
    function make_request(string $url) {
        $curl_obj = curl_init($url);
    }
}