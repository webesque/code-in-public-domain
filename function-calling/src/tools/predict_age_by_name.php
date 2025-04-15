<?php

require_once __DIR__ . '/../bootstrap.php';

/**
 * @param array{name: string} $data
 */
function predict_age_by_name(array $data): false|string {
    global $http_client;

    $response = $http_client->request('GET', 'https://api.agify.io/', [
        'query' => ['name' => $data['name']],
    ]);
    if ($response->getStatusCode() !== 200) {
        return false;
    }

    /** @var array{count: int, name: string, age: int} $data */
    $data = $response->toArray();

    return "Predicted age: " . $data['age'];
}
