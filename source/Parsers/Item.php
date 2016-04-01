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
use PagSeguro\Helpers\Currency;
use PagSeguro\Enum\Properties\Current;

/**
 * Class Item
 * @package PagSeguro\Parsers
 */
trait Item
{
    /**
     * @param Request $payment
     * @param $properties
     * @return array
     */
    public static function getData(Request $payment, $properties)
    {
        $data = [];
        $items = $payment->getItems();
        if ($payment->ItemLenght() > 0) {
            $i = 0;

            foreach ($items as $key => $value) {
                $i++;
                if ($items[$key]->getId() != null) {
                    $data[sprintf($properties::ITEM_ID, $i)] = $items[$key]->getId();
                }
                if ($items[$key]->getDescription() != null) {
                    $data[sprintf($properties::ITEM_DESCRIPTION, $i)] = $items[$key]->getDescription();
                }
                if ($items[$key]->getQuantity() != null) {
                    $data[sprintf($properties::ITEM_QUANTITY, $i)] = $items[$key]->getQuantity();
                }
                if ($items[$key]->getAmount() != null) {
                    $amount = Currency::toDecimal($items[$key]->getAmount());
                    $data[sprintf($properties::ITEM_AMOUNT, $i)] = $amount;
                }
                if ($items[$key]->getWeight() != null) {
                    $data[sprintf($properties::ITEM_WEIGHT, $i)] = $items[$key]->getWeight();
                }
                if ($items[$key]->getShippingCost() != null) {
                    $data[sprintf($properties::ITEM_SHIPPING_COST, $i)] = Currency::toDecimal(
                        $items[$key]->getShippingCost()
                    );
                }
            }
        }
        return $data;

    }
}
