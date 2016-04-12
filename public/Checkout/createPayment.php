<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

$payment = new \PagSeguro\Domains\Requests\Payment();

$payment->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    430.00
);

$payment->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    430.00
);

$payment->setCurrency("BRL");
$payment->setReference("LIBPHP000001");

$payment->setRedirectUrl("http://www.lojamodelo.com.br");

$payment->setSender()->withParameters(
    'João Comprador',
    'email@comprador.com.br',
    '11',
    '56273440',
    'CPF',
    '156.009.442-76'
);

$payment->setShipping()->setAddress()->withParameters(
    '01452002',
    'Av. Brig. Faria Lima',
    '1384',
    'apto. 114',
    'Jardim Paulistano',
    'São Paulo',
    'SP',
    'BRA'
);
$payment->setShipping()->setCost()->withParameters(20.00);
$payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

$payment->setRedirectUrl("http://www.lojamodelo.com.br");
$payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");

try {
    $result = $payment->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    var_dump($result);
} catch (Exception $e) {
    die($e->getMessage());
}
