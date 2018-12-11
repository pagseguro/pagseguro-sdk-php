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
/**
 *  Para usa o ambiente de testes (sandbox) descomentar a linha abaixo
 */
//\PagSeguro\Configuration\Configure::setEnvironment('sandbox');

$changePayment = new \PagSeguro\Domains\Requests\DirectPreApproval\ChangePayment();
$changePayment->setPreApprovalCode('q213213123');
/*
 * usar setHash ou setIp
 */
//$changePayment->setSender()->setHash('asdasd');
$changePayment->setSender()->setIp('ip');
$changePayment->setCreditCard()->setToken('token'); //token do cartão de crédito gerado via javascript
$changePayment->setCreditCard()->setHolder()->setName('Nome Teste'); //nome do titular do cartão de crédito
$changePayment->setCreditCard()->setHolder()->setBirthDate('10/10/1990'); //data de nascimento do titular do cartão de crédito
$document = new \PagSeguro\Domains\DirectPreApproval\Document();
$document->withParameters('CPF', 'cpf');  //cpf do titular do cartão de crédito
$changePayment->setCreditCard()->setHolder()->setDocuments($document);
$changePayment->setCreditCard()->setHolder()->setPhone()->withParameters('ddd', 'telefone'); //telefone do titular do cartão de crédito
$changePayment->setCreditCard()->setHolder()->setBillingAddress()->withParameters('logradouro', 'numero',
    'bairro', 'cep', 'cidade', 'UF', 'BRA'); //endereço do titular do cartão de crédito

try {
    $response = $changePayment->register(
        new \PagSeguro\Domains\AccountCredentials('email vendedor', 'token vendedor') // credencias do vendedor no pagseguro
    );

    echo '<pre>';
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}

