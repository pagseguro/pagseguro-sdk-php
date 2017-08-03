<?php
opcache_reset();
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

$preApproval = new \PagSeguro\Domains\Requests\DirectPreApproval\Accession();
$preApproval->setPlan('BAD08FD571713BEFF47F1F937D6D87DF');
$preApproval->setReference('ASSINATURA1');
$preApproval->setSender()->setName('Nome Sender Teste');
$preApproval->setSender()->setEmail('c41621608728044069935@sandbox.pagseguro.com.br');
$preApproval->setSender()->setIp($_SERVER["REMOTE_ADDR"]);
$preApproval->setSender()->setAddress()->withParameters('12', '123', '12313', '13472290', '123123123', 'SP',
    'BRA');
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', '46508636197');
$preApproval->setSender()->setDocuments($document);
$preApproval->setSender()->setPhone()->withParameters('ddd', 'telefone exemplo');
$preApproval->setPaymentMethod()->setCreditCard()->setToken('6d3d2125ffb34ddeba348d80c2086014');
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setName('Nome Teste');
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBirthDate('10/10/1990');
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', '46508636197');
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setDocuments($document);
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setPhone()->withParameters('ddd', 'telefone exemplo');
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBillingAddress()->withParameters('rua teste', '12',
    'Centro', '13472290', 'Americana', 'SP', 'BRA');

try {
    $response = $preApproval->register(
        new \PagSeguro\Domains\AccountCredentials('exemplo@sandbox', 'token teste')
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

