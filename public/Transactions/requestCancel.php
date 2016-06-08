<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

/**
 * @var transaction code
 */
$code = "9948DBE4-499B-4A14-BDCF-501C67DEBAA1";

try {
    $cancel = \PagSeguro\Services\Transactions\Cancel::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $code
    );
    echo "<pre>";
    print_r($cancel);
} catch (Exception $e) {
    die($e->getMessage());
}
