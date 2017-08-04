<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

$plan = new \PagSeguro\Domains\Requests\DirectPreApproval\Payment();
$plan->setPreApprovalCode('EA023ECBDEDE5E8114172FB941C06A5A');
$plan->setReference('REF1234-1');
$plan->setSenderHash('hash');
$plan->setSenderIp('1.1.1.1');
$item = new \PagSeguro\Domains\DirectPreApproval\Item();
$item->withParameters('1234', 'Assinatura X', '1', '99.90');
$plan->addItems($item);

try {
    $response = $plan->register(
        new \PagSeguro\Domains\AccountCredentials('thiago.pixelab@gmail.com', '9D72B35DFD8A4FDC89F6D69BD75D8F6F')
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

