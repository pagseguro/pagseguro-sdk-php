<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

$changePayment = new \PagSeguro\Domains\Requests\DirectPreApproval\ChangePayment();
$changePayment->setPreApprovalCode('q213213123');
/*
 * usar setHas ou setIp
 */
//$changePayment->setSender()->setHash('asdasd');
$changePayment->setSender()->setIp('1.1.1.1');
$changePayment->setCreditCard()->setToken('asdas');
$changePayment->setCreditCard()->setHolder()->setName('Nome teste');
$changePayment->setCreditCard()->setHolder()->setBirthDate('10/10/1990');
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', 'cpf exemplo');
$changePayment->setCreditCard()->setHolder()->setDocuments($document);
$changePayment->setCreditCard()->setHolder()->setPhone()->withParameters('ddd', 'telefone exemplo');
$changePayment->setCreditCard()->setHolder()->setBillingAddress()->withParameters('Rua Teste', '22', 'Centro',
    '14808300', 'Araraquara', 'SP', 'Brasil');

try {
    $response = $changePayment->register(
        new \PagSeguro\Domains\AccountCredentials('exemplo@sandbox', 'token exemplo')
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

