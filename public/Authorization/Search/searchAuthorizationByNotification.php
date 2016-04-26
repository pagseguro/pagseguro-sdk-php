<?php

require_once "../../../vendor/autoload.php";

\PagSeguro\Library::initialize();

$code = '7BD4A616E8C3E8C3F57BB440FFA9ABEAE6F2';

try {

    $response = \PagSeguro\Services\Application\Search\Notification::search(
        \PagSeguro\Configuration\Configure::getApplicationCredentials(),
        $code
    );

    var_dump($response);

} catch (Exception $e) {
    die($e->getMessage());
}