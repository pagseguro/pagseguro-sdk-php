<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$code = '0B64FD7B4F9641378E9C9462982A8B95';

try {
    $response = \PagSeguro\Services\Transactions\Search\Code::search(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $code
    );

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
