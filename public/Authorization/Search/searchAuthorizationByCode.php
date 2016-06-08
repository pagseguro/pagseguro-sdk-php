<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$code = 'FD3AF1B214EC40F0B0A6745D041BF50D';

try {
    $response = \PagSeguro\Services\Application\Search\Code::search(
        \PagSeguro\Configuration\Configure::getApplicationCredentials(),
        $code
    );

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
