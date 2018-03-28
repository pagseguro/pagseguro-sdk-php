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

namespace PagSeguro\Parsers\Transaction\Search\Code;

use PagSeguro\Enum\Properties\Current;
use PagSeguro\Parsers\Error;
use PagSeguro\Parsers\Parser;
use PagSeguro\Parsers\Transaction\Search\Code\Response;
use PagSeguro\Resources\Http;

/**
 * Class Payment
 * @package PagSeguro\Parsers\Checkout
 */
class Request extends Error implements Parser
{

    /**
     * @param $code
     * @return array
     */
    public static function getData($code)
    {
        $data = [];
        $properties = new Current;

        if (!is_null($code)) {
            $data[$properties::TRANSACTION_CODE] = $code;
        }
        return $data;
    }

    /**
     * @param \PagSeguro\Resources\Http $http
     * @return Response
     */
    public static function success(Http $http)
    {
        $xml = simplexml_load_string($http->getResponse());
        $response = new Response();
        $response->setDate(current($xml->date))
            ->setCode(current($xml->code))
            ->setReference(current($xml->reference))
            ->setType(current($xml->type))
            ->setStatus(current($xml->status))
            ->setLastEventDate(current($xml->lastEventDate))
            ->setPaymentMethod($xml->paymentMethod)
            ->setPaymentLink(current($xml->paymentLink))
            ->setGrossAmount(current($xml->grossAmount))
            ->setDiscountAmount(current($xml->discountAmount))
            ->setCreditorFees($xml->creditorFees)
            ->setNetAmount(current($xml->netAmount))
            ->setExtraAmount(current($xml->extraAmount))
            ->setEscrowEndDate(current($xml->escrowEndDate))
            ->setInstallmentCount(current($xml->installmentCount))
            ->setItemCount(current($xml->itemCount))
            ->setItems($xml->items)
            ->setSender($xml->sender)
            ->setShipping($xml->shipping)
            ->setPromoCode(current($xml->promoCode));
        return $response;
    }

    /**
     * @param \PagSeguro\Resources\Http $http
     * @return \PagSeguro\Domains\Error
     */
    public static function error(Http $http)
    {
        $error = parent::error($http);
        return $error;
    }
}
