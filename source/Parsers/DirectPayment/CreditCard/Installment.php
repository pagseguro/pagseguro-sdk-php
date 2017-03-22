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

namespace PagSeguro\Parsers\DirectPayment\CreditCard;

use PagSeguro\Domains\Requests\Requests;
use PagSeguro\Helpers\Currency;

/**
 * Class Installment
 * @package PagSeguro\Parsers\DirectPayment\CreditCard
 */
trait Installment
{
    /**
     * @param Requests $request
     * @param $properties
     * @return array
     */
    public static function getData(Requests $request, $properties)
    {
        $data = [];
        $installment = current($request->getInstallment());

        // quantity
        if (!is_null($installment->getQuantity())) {
            $data[$properties::INSTALLMENT_QUANTITY] = $installment->getQuantity();
        }
        // value
        if (!is_null($installment->getValue())) {
            $data[$properties::INSTALLMENT_VALUE] = Currency::toDecimal($installment->getValue());
        }
        // setNoInterestInstallmentQuantity
        if (!is_null($installment->getNoInterestInstallmentQuantity())) {
            $data[$properties::INSTALLMENT_NO_INTEREST_INSTALLMENT_QUANTITY] = Currency::toDecimal($installment->getNoInterestInstallmentQuantity());
        }

        return $data;
    }
}
