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

namespace PagSeguro\Resources\Factory\Sender;

use PagSeguro\Enum\Properties\Current;

/**
 * Class Document
 * @package PagSeguro\Resources\Factory
 */
class Phone
{

    /**
     * @var \PagSeguro\Domains\Sender
     */
    private $sender;

    /**
     * Document constructor.
     */
    public function __construct($sender)
    {
        $this->sender = $sender;
    }

    /**
     * @param \PagSeguro\Domains\Phone $document
     * @return \PagSeguro\Domains\Sender
     */
    public function instance(\PagSeguro\Domains\Phone $phone)
    {
        $this->sender->setPhone($phone);
        return $this->sender;
    }

    /**
     * @param $array
     * @return \PagSeguro\Domains\Sender
     */
    public function withArray($array)
    {
        $properties = new Current;
        $phone = new \PagSeguro\Domains\Phone();
        $phone->setAreaCode($array[$properties::SENDER_PHONE_AREA_CODE])
              ->setNumber($array[$properties::SENDER_PHONE_NUMBER]);
        $this->sender->setPhone($phone);
        return $this->sender;
    }


    /**
     * @param $areaCode
     * @param $number
     * @return \PagSeguro\Domains\Sender
     */
    public function withParameters($areaCode, $number)
    {
        $phone = new \PagSeguro\Domains\Phone();
        $phone->setAreaCode($areaCode)
              ->setNumber($number);
        $this->sender->setPhone($phone);
        return $this->sender;
    }
}
