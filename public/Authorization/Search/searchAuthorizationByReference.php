<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$options = [
    'initial_date' => '2015-09-09T00:00',
    'final_date' => '2015-09-12T09:55', //Optional
    'page' => 1, //Optional
    'max_per_page' => 20, //Optional
];

$reference = "REF123";

try {
    $response = \PagSeguro\Services\Application\Search\Reference::search(
        \PagSeguro\Configuration\Configure::getApplicationCredentials(),
        $reference,
        $options
    );

    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}
