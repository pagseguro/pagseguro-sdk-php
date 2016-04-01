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

namespace PagSeguro\Parsers;

use PagSeguro\Domains\Requests\Request;

/**
 * Class Basic
 * @package PagSeguro\Parsers
 */
trait Basic
{
    /**
     * @param Request $payment
     * @param $properties
     * @return array
     */
    public static function getData(Request $payment, $properties)
    {

        $data = [];
        // currency
        if (!is_null($payment->getCurrency())) {
            $data[$properties::CURRENCY] = $payment->getCurrency();
        }
        // reference
        if (!is_null($payment->getReference())) {
            $data[$properties::REFERENCE] = $payment->getReference();
        }
        // redirectURL
        if (!is_null($payment->getRedirectUrl())) {
            $data[$properties::REDIRECT_URL] = $payment->getRedirectUrl();
        }
        // notificationURL
        if (!is_null($payment->getNotificationUrl())) {
            $data[$properties::NOTIFICATION_URL] = $payment->getNotificationUrl();
        }
        return $data;
    }
}
