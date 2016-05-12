<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$days = 20;

try {
    $response = \PagSeguro\Services\PreApproval\Search\Interval::search(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $days
    );

    var_dump($response);
} catch (Exception $e) {
    die($e->getMessage());
}
