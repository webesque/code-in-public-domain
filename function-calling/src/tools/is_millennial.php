<?php

require_once __DIR__ .'/../bootstrap.php';

/**
 * @param array{age: int} $data
 */
function is_millennial(array $data): string
{
    $birth_year = date('Y') - $data['age'];
    if ($birth_year >= 1981 && $birth_year <= 1996) {
        return $data['age'] . " year olds, are of the millennial generation.";
    }

    return "No. People of that age are not millennial.";
}