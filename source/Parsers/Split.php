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
 * Class Basic
 * @package PagSeguro\Parsers
 */
trait Split
{
    /**
     * @param Requests $request
     * @param $properties
     * @return array
     */
    public static function getData(Requests $request, $properties)
    {
        $data = [];
        if (!is_null($request->getSplit())) {
            if (!is_null($request->getSplit()->getPrimaryReceiver())) {
                $data[$properties::PRIMARY_RECEIVER_PUBLIC_KEY] = $request->getSplit()->getPrimaryReceiver();
            }
            if (count($request->getSplit()->getReceivers()) > 0) {
                $receivers = $request->getSplit()->getReceivers();
                $count = 0;
                foreach ($receivers as $key => $value) {
                    $count++;
                    if (!is_null($receivers[$key]->getPublicKey())) {
                        $data[sprintf($properties::RECEIVER_PUBLIC_KEY, $count)] =
                            $receivers[$key]->getPublicKey();
                    }
                    if (!is_null($receivers[$key]->getAmount())) {
                        $data[sprintf($properties::RECEIVER_SPLIT_AMOUNT, $count)] =
                            \PagSeguro\Helpers\Currency::toDecimal($receivers[$key]->getAmount());
                    }
                    if (!is_null($receivers[$key]->getRatePercent())) {
                        $data[sprintf($properties::RECEIVER_SPLIT_RATE_PERCENT, $count)] =
                            \PagSeguro\Helpers\Currency::toDecimal($receivers[$key]->getRatePercent());
                    }
                    if (!is_null($receivers[$key]->getFeePercent())) {
                        $data[sprintf($properties::RECEIVER_SPLIT_FEE_PERCENT, $count)] =
                            \PagSeguro\Helpers\Currency::toDecimal($receivers[$key]->getFeePercent());
                    }
                }
            }
        }
        return $data;
    }
}
