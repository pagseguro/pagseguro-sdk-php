<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

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
