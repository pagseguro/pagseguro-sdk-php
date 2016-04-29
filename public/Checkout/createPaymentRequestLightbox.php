<?php

require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

?>
<!DOCTYPE html>
<html>
	<head>
        <?php if (\PagSeguro\Configuration\Configure::getEnvironment()->getEnvironment() == "sandbox"): ?>
	    <!--Para integração em ambiente de testes no Sandbox use este link-->
		<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
	    <?php else: ?>
        <!--Para integração em ambiente de produção use este link-->
		<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
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

$payment->setSender()->withParameters(
    'João Comprador',
    'email@comprador.com.br',
    (new \PagSeguro\Domains\Phone)->setAreaCode(11)->setNumber(56273440),
    (new \PagSeguro\Domains\Document)->setType('CPF')->setIdentifier('156.009.442-76')
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

//Add metadata items
$payment->addMetadata()->withParameters('PASSENGER_CPF', '11111111111');
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
        \PagSeguro\Configuration\Configure::getAccountCredentials(), $onlyCheckoutCode
    );

    echo "<h2>Criando requisi&ccedil;&atilde;o de pagamento. Aguarde...</h2>"
        . "<p>C&oacute;digo da transa&ccedil;&atilde;o: <strong>" . $result->getCode() . "</strong></p>"
        . "<script>PagSeguroLightbox('".$result->getCode()."');</script>";
} catch (Exception $e) {
    die($e->getMessage());
}
