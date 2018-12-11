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

namespace PagSeguro\Resources\Factory;

use PagSeguro\Enum\Properties\Current;

/**
 * Class Phone
 * @package PagSeguro\Resources\Factory
 */
class Phone
{
    /**
     * @var \PagSeguro\Domains\Phone
     */
    private $phone;

    /**
     * Phone constructor.
     */
    public function __construct()
    {
        $this->phone = new \PagSeguro\Domains\Phone();
    }

    /**
     * @param \PagSeguro\Domains\Phone $phone
     * @return \PagSeguro\Domains\Phone
     */
    public function instance(\PagSeguro\Domains\Phone $phone)
    {
        return $phone;
    }

    /**
     * @param $array
     */
    public function withArray($array)
    {
        $properties = new Current();
        $this->phone->setAreaCode($array[$properties::SENDER_PHONE_AREA_CODE])
            ->setNumber($array[$properties::SENDER_PHONE_NUMBER]);
    }

    /**
     * @param $areaCode
     * @param $number
     * @return \PagSeguro\Domains\Phone
     */
    public function withParameters($areaCode, $number)
    {
        $this->phone->setAreaCode($areaCode)
            ->setNumber($number);
        return $this->phone;
    }
}
