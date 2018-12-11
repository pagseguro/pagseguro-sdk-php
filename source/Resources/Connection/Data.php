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

namespace PagSeguro\Resources\Connection;

use PagSeguro\Domains\Account\Credentials;

/**
 * Class Data
 * @package PagSeguro\Services\Connection
 */
class Data
{
    use Base\Application\Authorization;
    use Base\Application\Authorization\Search {
        Base\Application\Authorization\Search::buildSearchRequestUrl as buildAuthorizationSearchRequestUrl;
        Base\Application\Authorization\Search::buildSearchRequestUrl insteadof Base\Transaction\Search;
    }
    use Base\Checkout\Payment;
    use Base\Credentials;
    use Base\DirectPayment\Payment;
    use Base\Installment;
    use Base\Notification;
    use Base\PreApproval\Cancel;
    use Base\PreApproval\Charge;
    use Base\PreApproval\Payment;
    use Base\PreApproval\Search {
        Base\PreApproval\Search::buildSearchRequestUrl as buildPreApprovalSearchRequestUrl;
        Base\PreApproval\Search::buildSearchRequestUrl insteadof Base\Application\Authorization\Search;
    }
    use Base\Refund;
    use Base\Session;
    use Base\Transaction\Abandoned;
    use Base\Transaction\Cancel;
    use Base\Transaction\Search {
        Base\Transaction\Search::buildSearchRequestUrl as buildTransactionSearchRequestUrl;
        Base\Transaction\Search::buildSearchRequestUrl insteadof Base\PreApproval\Search;
    }
    use Base\DirectPreApproval\Accession;
    use Base\DirectPreApproval\Plan;
    use Base\DirectPreApproval\EditPlan;
    use Base\DirectPreApproval\Query;
    use Base\DirectPreApproval\Payment;
    use Base\DirectPreApproval\Status;
    use Base\DirectPreApproval\Cancel;
    use Base\DirectPreApproval\Discount;
    use Base\DirectPreApproval\ChangePayment;
    use Base\DirectPreApproval\QueryPaymentOrder;
    use Base\DirectPreApproval\QueryNotification;
    use Base\DirectPreApproval\RetryPaymentOrder;

    /**
     * Data constructor.
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->setCredentials($credentials);
    }

    /**
     * @param $data
     * @return string
     */
    public function buildHttpUrl($data)
    {
        return http_build_query($data);
    }
}
