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
$editPlan->setAmountPerPayment('100.00');
$editPlan->setUpdateSubscriptions(false);
$editPlan->setPreApprovalRequestCode('código do plano');

try {
    $editPlan->register(
        new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );
} catch(Exception $e) {
    die($e->getMessage());
}