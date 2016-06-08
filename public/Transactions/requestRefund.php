<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

/**
 * @var transaction code
 */
$code = "0B64FD7B4F9641378E9C9462982A8B95";

/**
 * @var value to refund
 * @optional true
 */
$value = null;

try {
    $refund = \PagSeguro\Services\Transactions\Refund::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $code,
        $value
    );

    echo "<pre>";
    print_r($refund);
} catch (Exception $e) {
    die($e->getMessage());
}
