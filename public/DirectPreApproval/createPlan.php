<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
/**
 *  Para usa o ambiente de testes (sandbox) descomentar a linha abaixo
 */
//\PagSeguro\Configuration\Configure::setEnvironment('sandbox');

$plan = new \PagSeguro\Domains\Requests\DirectPreApproval\Plan();
$plan->setRedirectURL('http://meusite.com');
$plan->setReference('http://meusite.com');
$plan->setPreApproval()->setName('Plano XXXX');
$plan->setPreApproval()->setCharge('AUTO');
$plan->setPreApproval()->setPeriod('MONTHLY');
$plan->setPreApproval()->setAmountPerPayment('100.00');
$plan->setPreApproval()->setTrialPeriodDuration(28);
$plan->setPreApproval()->setDetails('detalhes do plano');
$plan->setPreApproval()->setFinalDate('2018-09-03');
$plan->setPreApproval()->setCancelURL("http://meusite.com");
$plan->setReviewURL('http://meusite.com./review');
$plan->setMaxUses(100);
$plan->setReceiver()->withParameters('exemplo@sandbox');

try {
    $response = $plan->register(
	    new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

