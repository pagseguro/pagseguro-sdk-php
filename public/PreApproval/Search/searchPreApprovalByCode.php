<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$code = 'DF7EB0AC9999333CC4379F82114239AB';

try {
    $response = \PagSeguro\Services\PreApproval\Search\Code::search(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $code
    );

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
