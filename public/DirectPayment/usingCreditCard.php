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

//Instantiate a new direct payment request, using Credit Card
$creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

/**
 * @todo Change the receiver Email
 */
$creditCard->setReceiverEmail('vendedor@lojamodelo.com.br');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$creditCard->setReference("LIBPHP000001");

// Set the currency
$creditCard->setCurrency("BRL");

// Add an item for this payment request
$creditCard->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    10.00
);

// Add an item for this payment request
$creditCard->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    5.00
);

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$creditCard->setSender()->setName('João Comprador');
$creditCard->setSender()->setEmail('email@comprador.com.br');

$creditCard->setSender()->setPhone()->withParameters(
    11,
    56273440
);

$creditCard->setSender()->setDocument()->withParameters(
    'CPF',
    'insira um numero de CPF valido'
);

$creditCard->setSender()->setHash('d94d002b6998ca9cd69092746518e50aded5a54aef64c4877ccea02573694986');

$creditCard->setSender()->setIp('127.0.0.0');

// Set shipping information for this payment request
$creditCard->setShipping()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

//Set billing information for credit card
$creditCard->setBilling()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

// Set credit card token
$creditCard->setToken('2ed34e61b24d4ea8ae872c66a512525c');

// Set the installment quantity and value (could be obtained using the Installments
// service, that have an example here in \public\getInstallments.php)
$creditCard->setInstallment()->withParameters(1, '30.00');

// Set the credit card holder information
$creditCard->setHolder()->setBirthdate('01/10/1979');
$creditCard->setHolder()->setName('João Comprador'); // Equals in Credit Card

$creditCard->setHolder()->setPhone()->withParameters(
    11,
    56273440
);

$creditCard->setHolder()->setDocument()->withParameters(
    'CPF',
    'insira um numero de CPF valido'
);

// Set the Payment Mode for this payment request
$creditCard->setMode('DEFAULT');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.

try {
    //Get the crendentials and register the boleto payment
    $result = $creditCard->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    echo "<pre>";
    print_r($result);
} catch (Exception $e) {
    echo "</br> <strong>";
    die($e->getMessage());
}
