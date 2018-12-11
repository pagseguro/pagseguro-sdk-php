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

?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php if (\PagSeguro\Configuration\Configure::getEnvironment()->getEnvironment() == "sandbox") : ?>
            <!--Para integração em ambiente de testes no Sandbox use este link-->
            <script
                    type="text/javascript"
                    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
            </script>
        <?php else : ?>
            <!--Para integração em ambiente de produção use este link-->
            <script
                    type="text/javascript"
                    src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
            </script>
        <?php endif; ?>
    </head>
    </html>

<?php

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
$payment->addParameter()->withParameters('itemAmount', '201.40')->index(3);

//Add items by parameter using an array
$payment->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);


$payment->setRedirectUrl("http://www.lojamodelo.com.br");
$payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");

try {
    $onlyCheckoutCode = true;
    $result = $payment->register(
        \PagSeguro\Configuration\Configure::getAccountCredentials(),
        $onlyCheckoutCode
    );

    echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento. Aguarde...</h2>"
        . "<p>C&oacute;digo da transa&ccedil;&atilde;o: <strong>" . $result->getCode() . "</strong></p>"
        . "<script>PagSeguroLightbox('" . $result->getCode() . "');</script>";
} catch (Exception $e) {
    die($e->getMessage());
}
