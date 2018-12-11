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

namespace PagSeguro\Parsers\Checkout;

use PagSeguro\Enum\Properties\Current;
use PagSeguro\Parsers\Accepted;
use PagSeguro\Parsers\Basic;
use PagSeguro\Parsers\Currency;
use PagSeguro\Parsers\Error;
use PagSeguro\Parsers\Item;
use PagSeguro\Parsers\Metadata;
use PagSeguro\Parsers\Parameter;
use PagSeguro\Parsers\Parser;
use PagSeguro\Parsers\PaymentMethod;
use PagSeguro\Parsers\PreApproval;
use PagSeguro\Parsers\ReceiverEmail;
use PagSeguro\Parsers\Sender;
use PagSeguro\Parsers\Shipping;
use PagSeguro\Resources\Http;

/**
 * Class Request
 * @package PagSeguro\Parsers\Checkout
 */
class Request extends Error implements Parser
{
    use Accepted;
    use Basic;
    use Currency;
    use Item;
    use PreApproval;
    use Sender;
    use Shipping;
    use Metadata;
    use ReceiverEmail;
    use Parameter;
    use PaymentMethod;

    /**
     * @param \PagSeguro\Domains\Requests\Payment $payment
     * @return array
     */
    public static function getData(\PagSeguro\Domains\Requests\Payment $payment)
    {
        $data = [];
        $properties = new Current;
        return array_merge(
            $data,
            Accepted::getData($payment, $properties),
            Basic::getData($payment, $properties),
            Currency::getData($payment, $properties),
            Item::getData($payment, $properties),
            PreApproval::getData($payment, $properties),
            Sender::getData($payment, $properties),
            Shipping::getData($payment, $properties),
            Metadata::getData($payment, $properties),
            Parameter::getData($payment),
            PaymentMethod::getData($payment, $properties),
            ReceiverEmail::getData($payment, $properties)
        );
    }

    /**
     * @param Http $http
     * @return mixed|Response
     */
    public static function success(Http $http)
    {
        $xml = simplexml_load_string($http->getResponse());
        return (new Response)->setCode(current($xml->code))
            ->setDate(current($xml->date));
    }

    /**
     * @param Http $http
     * @return mixed|\PagSeguro\Domains\Error
     */
    public static function error(Http $http)
    {
        return parent::error($http);
    }
}
