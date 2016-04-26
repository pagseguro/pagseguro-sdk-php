<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$initialDate = '2016-04-01T14:55';
$finalDate = '2016-04-24T09:55';
$pageNumber = 1; //Optional
$maxPageResults = 20; //Optional

try {

    $response = \PagSeguro\Services\Transactions\Search\Abandoned::search(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $initialDate,
        $finalDate,
        $maxPageResults,
        $pageNumber
    );

    var_dump($response);

} catch (Exception $e) {
    die($e->getMessage());
}