<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
/**
 *  Para usa o ambiente de testes (sandbox) descomentar a linha abaixo
 */
//\PagSeguro\Configuration\Configure::setEnvironment('sandbox');

$editPlan = new \PagSeguro\Domains\Requests\DirectPreApproval\EditPlan();
$editPlan->setPreApprovalRequestCode('código do plano');
$editPlan->setAmountPerPayment('90.00'); //novo valor para cobrança do plano
$editPlan->setUpdateSubscriptions(false); //indica se a alteração de valor deve afetar as adesões vigentes do plano.

try {
    $response = $editPlan->register(
        new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}