<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

//Instantiate a new Boleto Object
$boleto = new \PagSeguro\Domains\Requests\DirectPayment\Boleto();

// Set the Payment Mode for this payment request
$boleto->setMode('DEFAULT');

/**
 * @todo Change the receiver Email
 */
$boleto->setReceiverEmail('vendedor@lojamodelo.com.br'); 

// Set the currency
$boleto->setCurrency("BRL");

// Add an item for this payment request
$boleto->addItems()->withParameters(
    '0001',
    'Notebook prata',
    2,
    130.00
);

// Add an item for this payment request
$boleto->addItems()->withParameters(
    '0002',
    'Notebook preto',
    2,
    430.00
);

// Set a reference code for this payment request. It is useful to identify this payment
// in future notifications.
$boleto->setReference("LIBPHP000001");

//set extra amount
$boleto->setExtraAmount(11.5);

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
$boleto->setSender()->setName('João Comprador');
$boleto->setSender()->setEmail('email@comprador.com.br');

$boleto->setSender()->setPhone()->withParameters(
    11,
    56273440
);

$boleto->setSender()->setDocument()->withParameters(
    'CPF',
    '156.009.442-76'
);

$boleto->setSender()->setHash('d94d002b6998ca9cd69092746518e50aded5a54aef64c4877ccea02573694986');

$boleto->setSender()->setIp('127.0.0.0');

// Set shipping information for this payment request
$boleto->setShipping()->setAddress()->withParameters(
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
    $result = $boleto->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );
    
    printBoletoResult($result);
} catch (Exception $e) {
    echo "</br> <strong>";
    die($e->getMessage());
}

/**
 * Print boleto info
 * @param PagSeguro\Parsers\Transaction\Response $result
 */
function printBoletoResult($result)
{
    echo "<h2>Retorno da transa&ccedil;&atilde;o com Boleto</h2>";
    echo "<p><strong>Date: </strong> ".$result->getDate() ."</p> ";
    echo "<p><strong>lastEventDate: </strong> ".$result->getLastEventDate()."</p> ";
    echo "<p><strong>code: </strong> ".$result->getCode() ."</p> ";
    echo "<p><strong>reference: </strong> ".$result->getReference() ."</p> ";
    echo "<p><strong>type: </strong> ".$result->getType() ."</p> ";
    echo "<p><strong>status: </strong> ".$result->getStatus() ."</p> ";

    echo "<p><strong>paymentMethodType: </strong> ".$result->getPaymentMethod()->getType() ."</p> ";
    echo "<p><strong>paymentModeCode: </strong> ".$result->getPaymentMethod()->getCode() ."</p> ";
    echo "<p><strong>paymentLink: </strong> <a title=\"URL do pagamento\" href=\"{$result->getPaymentLink()}\" target=\_blank\">{$result->getPaymentLink()}</a></p>";

    echo "<p><strong>grossAmount: </strong> ".$result->getGrossAmount() ."</p> ";
    echo "<p><strong>discountAmount: </strong> ".$result->getDiscountAmount() ."</p> ";
    echo "<p><strong>feeAmount: </strong> ".$result->getFeeAmount() ."</p> ";
    echo "<p><strong>netAmount: </strong> ".$result->getNetAmount() ."</p> ";
    echo "<p><strong>extraAmount: </strong> ".$result->getExtraAmount() ."</p> ";

    echo "<p><strong>installmentCount: </strong> ".$result->getInstallmentCount() ."</p> ";
    echo "<p><strong>itemCount: </strong> ".$result->getItemCount() ."</p> ";

    echo "<p><strong>Items: </strong></p>";
    foreach ($result->getItems() as $item)
    {
        echo "<p><strong>id: </strong> ". $item->getId() ."</br> ";
        echo "<strong>description: </strong> ". $item->getDescription() ."</br> ";
        echo "<strong>quantity: </strong> ". $item->getQuantity() ."</br> ";
        echo "<strong>amount: </strong> ". $item->getAmount() ."</p> ";
    }

    echo "<p><strong>senderName: </strong> ".$result->getSender()->getName() ."</p> ";
    echo "<p><strong>senderEmail: </strong> ".$result->getSender()->getEmail() ."</p> ";
    echo "<p><strong>senderPhone: </strong> ".$result->getSender()->getPhone()->getAreaCode() . " - " .
         $result->getSender()->getPhone()->getNumber() . "</p> ";
    echo "<p><strong>Shipping: </strong></p>";
    echo "<p><strong>street: </strong> ".$result->getShipping()->getAddress()->getStreet() ."</p> ";
    echo "<p><strong>number: </strong> ".$result->getShipping()->getAddress()->getNumber()  ."</p> ";
    echo "<p><strong>complement: </strong> ".$result->getShipping()->getAddress()->getComplement()  ."</p> ";
    echo "<p><strong>district: </strong> ".$result->getShipping()->getAddress()->getDistrict()  ."</p> ";
    echo "<p><strong>postalCode: </strong> ".$result->getShipping()->getAddress()->getPostalCode()  ."</p> ";
    echo "<p><strong>city: </strong> ".$result->getShipping()->getAddress()->getCity()  ."</p> ";
    echo "<p><strong>state: </strong> ".$result->getShipping()->getAddress()->getState()  ."</p> ";
    echo "<p><strong>country: </strong> ".$result->getShipping()->getAddress()->getCountry()  ."</p> ";
}