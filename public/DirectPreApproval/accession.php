<?php
require_once "../../vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");
/**
 *  Para usa o ambiente de testes (sandbox) descomentar a linha abaixo
 */
//\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setLog(true, '/var/www/git/pagseguro/pagseguro-php-sdk/Log.log');

$preApproval = new \PagSeguro\Domains\Requests\DirectPreApproval\Accession();
$preApproval->setPlan('código do plano');
$preApproval->setReference('referência da assinatura');
$preApproval->setSender()->setName('nome');//assinante
$preApproval->setSender()->setEmail('email');//assinante
$preApproval->setSender()->setIp('ip');//assinante
$preApproval->setSender()->setAddress()->withParameters('logradouro', 'numero', 'bairro', 'cep', 'cidade', 'UF',
    'BRA');//assinante
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', 'cpf'); //assinante
$preApproval->setSender()->setDocuments($document);
$preApproval->setSender()->setPhone()->withParameters('ddd', 'telefone'); //assinante
$preApproval->setPaymentMethod()->setCreditCard()->setToken('token'); //token do cartão de crédito gerado via javascript
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setName('Nome Teste'); //nome do titular do cartão de crédito
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBirthDate('10/10/1990'); //data de nascimento do titular do cartão de crédito
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', 'cpf'); //cpf do titular do cartão de crédito
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setDocuments($document);
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setPhone()->withParameters('ddd', 'telefone'); //telefone do titular do cartão de crédito
$preApproval->setPaymentMethod()->setCreditCard()->setHolder()->setBillingAddress()->withParameters('logradouro', 'numero',
    'bairro', 'cep', 'cidade', 'UF', 'BRA'); //endereço do titular do cartão de crédito

try {
    $response = $preApproval->register(
	    new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

