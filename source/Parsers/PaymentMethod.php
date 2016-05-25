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

use PagSeguro\Domains\Requests\Requests;

/**
 * Parser for the Payment Method
 *
 */
trait PaymentMethod
{

    /**
     * @param Requests $request
     * @param $properties
     * @return array
     */
    public static function getData(Requests $request, $properties)
    {
        $data = [];
        $paymentMethod = $request->getPaymentMethod();
        if ($request->paymentMethodLenght() > 0) {
            $count = 0;

            foreach ($paymentMethod as $key => $value) {
                $count++;
                if (!is_null($paymentMethod[$key]->getGroup())) {
                    $data[sprintf($properties::PAYMENT_METHOD_GROUP, $count)] = $paymentMethod[$key]->getGroup();
                }
                if (!is_null($paymentMethod[$key]->getKey())) {
                    $data[sprintf($properties::PAYMENT_METHOD_CONFIG_KEY, $count, 1)] = $paymentMethod[$key]->getKey();
                }
                if (!is_null($paymentMethod[$key]->getValue())) {
                    $data[sprintf($properties::PAYMENT_METHOD_CONFIG_VALUE, $count, 1)] =
                        \PagSeguro\Helpers\Currency::toDecimal($paymentMethod[$key]->getValue());
                }
            }
        }
        return $data;
    }
}
