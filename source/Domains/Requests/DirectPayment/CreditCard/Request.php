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

namespace PagSeguro\Domains\Requests\DirectPayment\CreditCard;

use PagSeguro\Domains\Requests\Currency;
use PagSeguro\Domains\Requests\DirectPayment\CreditCard\Billing;
use PagSeguro\Domains\Requests\DirectPayment\CreditCard\Holder;
use PagSeguro\Domains\Requests\DirectPayment\Mode;
use PagSeguro\Domains\Requests\DirectPayment\Sender;
use PagSeguro\Domains\Requests\Item;
use PagSeguro\Domains\Requests\Notification;
use PagSeguro\Domains\Requests\Parameter;
use PagSeguro\Domains\Requests\ReceiverEmail;
use PagSeguro\Domains\Requests\Redirect;
use PagSeguro\Domains\Requests\Reference;
use PagSeguro\Domains\Requests\Requests;
use PagSeguro\Domains\Requests\Shipping;

/**
 * Class Request
 * @package PagSeguro\Domains\Requests\DirectPayment\CreditCard
 */
class Request implements Requests
{
    use Billing;
    use Currency;
    use Installment;
    use Holder;
    use Item;
    use Mode;
    use Notification {
        Notification::getUrl as getNotificationUrl;
        Notification::setUrl as setNotificationUrl;
        Notification::getUrl insteadof Redirect;
        Notification::setUrl insteadof Redirect;
    }
    use Parameter;
    use ReceiverEmail;
    use Sender;
    use Shipping;
    use Reference;
    use Redirect {
        Redirect::getUrl as getRedirectUrl;
        Redirect::setUrl as setRedirectUrl;
    }
    use Token;
}
