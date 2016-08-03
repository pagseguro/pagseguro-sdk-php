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
$internationalCreditCard = new \PagSeguro\Domains\Requests\DirectPayment\InternationalCreditCard();

// Set the Payment Mode for this payment request
$internationalCreditCard->setMode('DEFAULT');

/**
 * @todo Change the receiver Email
 */
$internationalCreditCard->setReceiverEmail('vendedor@lojamodelo.com.br');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$internationalCreditCard->setReference("LIBPHP000001");

// Set the currency
$internationalCreditCard->setCurrency("BRL");

// Add an item for this payment request
$internationalCreditCard->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    10.00
);

// Add an item for this payment request
$internationalCreditCard->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    5.00
);

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$internationalCreditCard->setSender()->setName('João Comprador');
$internationalCreditCard->setSender()->setEmail('comprador@email.combr');

$internationalCreditCard->setSender()->setPhone()->withParameters(
    11,
    56273440
);

$internationalCreditCard->setSender()->setDocument()->withParameters(
    'CPF',
    'insira um numero de CPF valido'
);

$internationalCreditCard->setSender()->setHash('a2fd31b1024da2100d490d338aa3e2ade0a237b397a267177b8ff3ec88a06026');

$internationalCreditCard->setSender()->setIp('127.0.0.0');

// Set credit card token
$internationalCreditCard->setToken('ef35fdd9b3b84c7db0c1de132649f2c0');

// Set the installment quantity and value (could be obtained using the Installments 
// service, that have an example here in \public\getInstallments.php)
$internationalCreditCard->setInstallment()->withParameters(1, '30.00');

try {
    //Get the crendentials and register the boleto payment
    $result = $internationalCreditCard->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    echo "<pre>";
    print_r($result);
} catch (Exception $e) {
    echo "</br> <strong>";
    die($e->getMessage());
}
