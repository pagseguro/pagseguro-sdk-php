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

//Instantiate a new Boleto Object
$onlineDebit = new \PagSeguro\Domains\Requests\DirectPayment\OnlineDebit();

// Set the Payment Mode for this payment request
$onlineDebit->setMode('DEFAULT');

// Set bank for this payment request
$onlineDebit->setBankName('nomedobanco');

/**
 * @todo Change the receiver Email
 */
$onlineDebit->setReceiverEmail('vendedor@lojamodelo.com.br');

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$onlineDebit->setReference("LIBPHP000001");

// Set the currency
$onlineDebit->setCurrency("BRL");

// Add an item for this payment request
$onlineDebit->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    130.00
);

// Add an item for this payment request
$onlineDebit->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    430.00
);

//set extra amount
$onlineDebit->setExtraAmount(11.5);

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$onlineDebit->setSender()->setName('João Comprador');
$onlineDebit->setSender()->setEmail('email@comprador.com.br');

$onlineDebit->setSender()->setPhone()->withParameters(
    11,
    56273440
);

$onlineDebit->setSender()->setDocument()->withParameters(
    'CPF',
    'insira um numero de CPF valido'
);

$onlineDebit->setSender()->setHash('3dc25e8a7cb3fd3104e77ae5ad0e7df04621caa33e300b27aeeb9ed5fdf1a24f');

$onlineDebit->setSender()->setIp('127.0.0.0');

// Set shipping information for this payment request
$onlineDebit->setShipping()->setAddress()->withParameters(
    'Av. Brig. Faria Lima',
    '1384',
    'Jardim Paulistano',
    '01452002',
    'São Paulo',
    'SP',
    'BRA',
    'apto. 114'
);

try {
    //Get the crendentials and register the boleto payment
    $result = $onlineDebit->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );

    echo "<pre>";
    print_r($result);
} catch (Exception $e) {
    echo "</br> <strong>";
    die($e->getMessage());
}
