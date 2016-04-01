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
use PagSeguro\Enum\Properties\Current;

/**
 * Class Sender
 * @package PagSeguro\Parsers
 */
trait Sender
{
    /**
     * @param Request $payment
     * @param $properties
     * @return array
     */
    public static function getData(Request $payment, $properties)
    {
        $data = [];
        // sender
        if (!is_null($payment->getSender())) {
            if (!is_null($payment->getSender()->getName())) {
                $data[$properties::SENDER_NAME] = $payment->getSender()->getName();
            }
            if (!is_null($payment->getSender()->getEmail())) {
                $data[$properties::SENDER_EMAIL] = $payment->getSender()->getEmail();
            }
            // phone
            if (!is_null($payment->getSender()->getPhone())) {
                array($data, self::phone($payment, $properties));
            }
            // documents
            if (!is_null($payment->getSender()->getDocuments())) {
                array($data, self::documents($payment, $properties));
            }
            if (!is_null($payment->getSender()->getIP())) {
                $data[$properties::SENDER_IP] = $payment->sender()->get()->getIP();
            }
        }
        return $data;
    }

    private static function phone($payment, $properties)
    {
        $data = [];
        if (!is_null($payment->getSender()->getPhone()->getAreaCode())) {
            $data[$properties::SENDER_PHONE_AREA_CODE] = $payment->getSender()->getPhone()->getAreaCode();
        }
        if (!is_null($payment->getSender()->getPhone()->getNumber())) {
            $data[$properties::SENDER_PHONE_NUMBER] = $payment->getSender()->getPhone()->getNumber();
        }
        return $data;
    }

    private static function documents($payment, $properties)
    {
        $data = [];
        $documents = $payment->getSender()->getDocuments();
        if (is_array($documents) && count($documents) == 1) {
            foreach ($documents as $document) {
                if (!is_null($document)) {
                    $document->getType() == "CPF" ?
                        $data[$properties::SENDER_DOCUMENT_CPF] = $document->getIdentifier() :
                        $data[$properties::SENDER_DOCUMENT_CNPJ] = $document->getIdentifier();
                }
            }
        }
        return $data;
    }
}
