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

namespace PagSeguro\Resources\Factory\Request\DirectPayment\CreditCard;

/**
 * Description of Installment
 *
 * @package PagSeguro\Resources\Factory\Request\DirectPayment\CreditCard
 */
class Installment
{
    private $installment;

    public function __construct()
    {
        $this->installment = [];
    }

    public function instance(\PagSeguro\Domains\DirectPayment\CreditCard\Installment $installment)
    {
        return $installment;
    }

    public function withArray($array)
    {
        $installment = new \PagSeguro\Domains\DirectPayment\CreditCard\Installment();
        $installment->setQuantity($array['quantity'])
            ->setValue($array['value']);

        if (isset($array['no_interest_installment_quantity'])) {
            $installment->setNoInterestInstallmentQuantity($array['no_interest_installment_quantity']);
        }

        $this->installment = $installment;
        return $this->installment;
    }

    public function withParameters($quantity, $value, $noInterestInstallmentQuantity = null)
    {
        $installment = new \PagSeguro\Domains\DirectPayment\CreditCard\Installment();
        $installment->setQuantity($quantity)
            ->setValue($value);

        if ($noInterestInstallmentQuantity) {
            $installment->setNoInterestInstallmentQuantity($noInterestInstallmentQuantity);
        }

        $this->installment = $installment;

        return $this->installment;
    }
}
