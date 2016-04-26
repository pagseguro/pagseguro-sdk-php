<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$initialDate = '2016-04-01T14:55';
$finalDate = '2016-04-25T14:44';
$pageNumber = 1; //Optional
$maxPageResults = 20; //Optional

$reference = "LIBPHP000001";

try {

    $response = \PagSeguro\Services\Transactions\Search\Reference::search(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $reference,
        $initialDate,
        $finalDate,
        $maxPageResults,
        $pageNumber
    );

    var_dump($response);

} catch (Exception $e) {
    die($e->getMessage());
}