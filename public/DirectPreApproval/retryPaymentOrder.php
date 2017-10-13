<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
/**
 *  Para usa o ambiente de testes (sandbox) descomentar a linha abaixo
 */
//\PagSeguro\Configuration\Configure::setEnvironment('sandbox');

$plan = new \PagSeguro\Domains\Requests\DirectPreApproval\RetryPaymentOrder();
$plan->setPreApprovalCode('código da assinatura');
$plan->setPaymentOrderCode('código da ordem de pagamento');

try {
    $response = $plan->register(
	    new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

