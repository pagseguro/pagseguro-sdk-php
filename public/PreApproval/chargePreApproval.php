<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

$preApproval = new \PagSeguro\Domains\Requests\PreApproval\Charge();
$preApproval->setReference("LIB0000001PREAPPROVAL");
$preApproval->setCode("30B5FFD8F2F2370224519FBDCC2BCA60");
$preApproval->addItems()->withParameters(
    '0001',
    'Notebook prata',
    1,
    100.00
);

try {
    $response = $preApproval->register(\PagSeguro\Configuration\Configure::getAccountCredentials());
    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}