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
    130.00
);

$payment->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    430.00
);

$payment->setCurrency("BRL");

$payment->setExtraAmount(11.5);

$payment->setReference("LIBPHP000001");

$payment->setRedirectUrl("http://www.lojamodelo.com.br");

// Set your customer information.
$payment->setSender()->setName('João Comprador');
$payment->setSender()->setEmail('email@comprador.com.br');
$payment->setSender()->setPhone()->withParameters(
    11,
    56273440
);
$payment->setSender()->setDocument()->withParameters(
    'CPF',
    'insira um numero de CPF valido'
);
$payment->setShipping()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

$payment->setShipping()->setCost()->withParameters(20.00);
$payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

//Add metadata items
$payment->addMetadata()->withParameters('PASSENGER_CPF', 'insira um numero de CPF valido');
$payment->addMetadata()->withParameters('GAME_NAME', 'DOTA');
$payment->addMetadata()->withParameters('PASSENGER_PASSPORT', '23456', 1);

//Add items by parameter
$payment->addParameter()->withParameters('itemId', '0003')->index(3);
$payment->addParameter()->withParameters('itemDescription', 'Notebook Rosa')->index(3);
$payment->addParameter()->withParameters('itemQuantity', '1')->index(3);
$payment->addParameter()->withParameters('itemAmount', '200.00')->index(3);

//Add items by parameter using an array
$payment->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);

/***
 * Pre Approval information
 */
$payment->setPreApproval()->setCharge('manual');
$payment->setPreApproval()->setName("Seguro contra roubo do Notebook Prata");
$payment->setPreApproval()->setDetails("Todo dia 30 será cobrado o valor de R100,00 referente ao seguro contra
            roubo do Notebook Prata.");
$payment->setPreApproval()->setAmountPerPayment('100.00');
$payment->setPreApproval()->setMaxAmountPerPeriod('200.00');
$payment->setPreApproval()->setPeriod('Monthly');
$payment->setPreApproval()->setMaxTotalAmount('2400.00');
$payment->setPreApproval()->setInitialDate('2016-05-13T00:00:00');
$payment->setPreApproval()->setFinalDate('2018-05-07T00:00:00');

$payment->setRedirectUrl("http://www.lojamodelo.com.br");
$payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");
$payment->setReviewUrl("http://www.lojateste.com.br/review");

try {

    /**
     * @todo For checkout with application use:
     * \PagSeguro\Configuration\Configure::getApplicationCredentials()
     *  ->setAuthorizationCode("FD3AF1B214EC40F0B0A6745D041BF50D")
     */
    $result = $payment->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );

    echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>"
        . "<p>URL do pagamento: <strong>$result</strong></p>"
        . "<p><a title=\"URL do pagamento\" href=\"$result\" target=\_blank\">Ir para URL do pagamento.</a></p>";
} catch (Exception $e) {
    die($e->getMessage());
}
