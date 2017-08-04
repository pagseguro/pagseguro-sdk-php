<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

$status = new \PagSeguro\Domains\Requests\DirectPreApproval\Cancel();
$status->setPreApprovalCode('EE3283468282A96AA4984FB4F7B40252');

try {
    $response = $status->register(
        new \PagSeguro\Domains\AccountCredentials('exemplo@sandbox', 'token exemplo')
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

