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

namespace PagSeguro\Domains\Responses;

use PagSeguro\Domains\Responses\Installment;

/**
 * Domain class for Installments
 */
class Installments
{
    /**
     *
     * @var
     */
    private $installments;
    
    /**
     * @return array
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param  PagSeguro\Domains\Responses\Installment $installments
     */
    public function setInstallments($installments)
    {
        if ($installments) {
            if (is_object($installments)) {
                $this->addInstallment($installments);
            } else {
                foreach ($installments as $installment) {
                    $this->addInstallment($installment);
                }
            }
        }
    }
    
    /**
     * @param PagSeguro\Domains\Responses\Installment $installment
     */
    private function addInstallment($installment)
    {
        $response = new Installment;
        $response->setCardBrand(current($installment->cardBrand))
            ->setQuantity(current($installment->quantity))
            ->setAmount(current($installment->amount))
            ->setTotalAmount(current($installment->totalAmount))
            ->setInterestFree(current($installment->interestFree));
        
        $this->installments[] = $response;
    }
}
