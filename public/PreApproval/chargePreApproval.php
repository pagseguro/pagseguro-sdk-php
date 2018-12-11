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

$preApproval = new \PagSeguro\Domains\Requests\PreApproval\Charge();
$preApproval->setReference("LIB0000001PREAPPROVAL");
$preApproval->setCode("30B5FFD8F2F2370224519FBDCC2BCA60");
$preApproval->addItems()->withParameters(
    '0001',
    'Notebook prata',
    1,
    100.00
);

try {
    $response = $preApproval->register(\PagSeguro\Configuration\Configure::getAccountCredentials());
    echo "<pre>";
    print_r($response);
} catch (Exception $e) {
    die($e->getMessage());
}