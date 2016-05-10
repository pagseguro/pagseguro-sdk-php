<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

/**
 * @var string PreApproval code
 */
$code = "DF7EB0AC9999333CC4379F82114239AB";

try {
    $cancel = \PagSeguro\Services\PreApproval\Cancel::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $code
    );

    var_dump($cancel);
} catch (Exception $e) {
    die($e->getMessage());
}