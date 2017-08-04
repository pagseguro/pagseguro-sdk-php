<?php

require_once "../../vendor/autoload.php";

use PagSeguro\Enum\Properties\Current as PagSeguroEnum;

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

$payment = new \PagSeguro\Domains\Requests\Payment();

$payment->addItems()->withArray([
    PagSeguroEnum::ITEM_ID => '0001',
    PagSeguroEnum::ITEM_DESCRIPTION => 'Notebook prata',
    PagSeguroEnum::ITEM_QUANTITY => 2,
    PagSeguroEnum::ITEM_AMOUNT => 130.00
]);

$payment->addItems()->withArray([
    PagSeguroEnum::ITEM_ID => '0002',
    PagSeguroEnum::ITEM_DESCRIPTION => 'Notebook preto',
    PagSeguroEnum::ITEM_QUANTITY => 2,
    PagSeguroEnum::ITEM_AMOUNT => 430.00
]);

$payment->setCurrency("BRL");

$payment->setExtraAmount(11.5);

$payment->setReference("LIBPHP000001");

$payment->setRedirectUrl("http://www.lojamodelo.com.br");

// Set your customer information.
$payment->setSender()->setName('João Comprador');
$payment->setSender()->setEmail('email@comprador.com.br');
$payment->setSender()->setPhone()->withArray([
    PagSeguroEnum::SENDER_PHONE_AREA_CODE => 11,
    PagSeguroEnum::SENDER_PHONE_NUMBER => 56273440
]);
$payment->setSender()->setDocument()->withArray([
    PagSeguroEnum::DOCUMENT_TYPE => 'CPF',
    PagSeguroEnum::DOCUMENT_VALUE => 'insira um numero de CPF valido (apenas numeros)'
]);

$payment->setShipping()->setAddress()->withArray([
    PagSeguroEnum::SHIPPING_ADDRESS_STREET => 'Av. Brig. Faria Lima',
    PagSeguroEnum::SHIPPING_ADDRESS_NUMBER => '1384',
    PagSeguroEnum::SHIPPING_ADDRESS_DISTRICT => 'Jardim Paulistano',
    PagSeguroEnum::SHIPPING_ADDRESS_POSTAL_CODE => '01452002',
    PagSeguroEnum::SHIPPING_ADDRESS_CITY => 'São Paulo',
    PagSeguroEnum::SHIPPING_ADDRESS_STATE => 'SP',
    PagSeguroEnum::SHIPPING_ADDRESS_COUNTRY => 'BRA',
    PagSeguroEnum::SHIPPING_ADDRESS_COMPLEMENT => 'apto. 114'
]);
$payment->setShipping()->setCost()->withParameters(20.00);
$payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

//Add metadata items
$payment->addMetadata()->withParameters('PASSENGER_CPF', 'insira um numero de CPF valido');
$payment->addMetadata()->withParameters('GAME_NAME', 'DOTA');
$payment->addMetadata()->withParameters('PASSENGER_PASSPORT', '23456', 1);

//Add items by parameter
//On index, you have to pass in parameter: total items plus one.
$payment->addParameter()->withParameters('itemId', '0003')->index(3);
$payment->addParameter()->withParameters('itemDescription', 'Notebook Amarelo')->index(3);
$payment->addParameter()->withParameters('itemQuantity', '1')->index(3);
$payment->addParameter()->withParameters('itemAmount', '200.00')->index(3);

//Add items by parameter using an array
$payment->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);

$payment->setRedirectUrl("http://www.lojamodelo.com.br");
$payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");

//Add discount
$payment->addPaymentMethod()->withParameters(
    PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
    PagSeguro\Enum\PaymentMethod\Config\Keys::DISCOUNT_PERCENT,
    10.00 // (float) Percent
);

//Add installments with no interest
$payment->addPaymentMethod()->withParameters(
    PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
    PagSeguro\Enum\PaymentMethod\Config\Keys::MAX_INSTALLMENTS_NO_INTEREST,
    2 // (int) qty of installment
);

//Add a limit for installment
$payment->addPaymentMethod()->withParameters(
    PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
    PagSeguro\Enum\PaymentMethod\Config\Keys::MAX_INSTALLMENTS_LIMIT,
    6 // (int) qty of installment
);

// Add a group and/or payment methods name
$payment->acceptPaymentMethod()->groups(
    \PagSeguro\Enum\PaymentMethod\Group::CREDIT_CARD,
    \PagSeguro\Enum\PaymentMethod\Group::BALANCE
);
$payment->acceptPaymentMethod()->name(\PagSeguro\Enum\PaymentMethod\Name::DEBITO_ITAU);
// Remove a group and/or payment methods name
$payment->excludePaymentMethod()->group(\PagSeguro\Enum\PaymentMethod\Group::BOLETO);


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
