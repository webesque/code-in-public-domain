<?php

require_once __DIR__ . '/../bootstrap.php';

function get_random_cat_fact(): false|string {
    global $http_client;

    $response = $http_client->request('GET', 'https://catfact.ninja/fact');
    if ($response->getStatusCode() !== 200) {
        return false;
    }

    /** @var array{fact: string, length: int} $data */
    $data = $response->toArray();

    return "Fact: " . $data['fact'];
}
