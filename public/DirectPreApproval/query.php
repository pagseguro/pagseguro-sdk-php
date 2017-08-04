<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

/**
 * @param $page
 * @param $maxPageResults
 * @param $initialDate
 * @param $finalDate
 * @param $status
 * @param $preApprovalRequest
 * @param $senderEmail
 */
$queryPreApproval = new \PagSeguro\Domains\Requests\DirectPreApproval\Query(null, null, '2017-08-01', '2017-08-02');

try {
    $response = $queryPreApproval->register(
        new \PagSeguro\Domains\AccountCredentials('exemplo@sandbox', 'token exemplo')
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

