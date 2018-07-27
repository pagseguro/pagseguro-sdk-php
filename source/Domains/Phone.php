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

namespace PagSeguro\Domains;

use PagSeguro\Enum\Authorization\PhoneEnum;

/**
 * Class Phone
 *
 * @package PagSeguro\Domains
 */
class Phone
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var integer
     */
    private $areaCode;
    /**
     * @var integer
     */
    private $number;

    /**
     * Phone constructor.
     *
     * @param null      $areaCode
     * @param null      $number
     * @param PhoneEnum $type
     */
    public function __construct($areaCode = null, $number = null, $type = null)
    {
        $this->areaCode = $areaCode;
        $this->number = $number;
        if ($type && $this->validateType($type)) {
            $this->type = $type;
        }
    }

    private function validateType($type)
    {
        if (!array_key_exists($type, PhoneEnum::getList())) {
            throw new \InvalidArgumentException("Must be a valid currency, see \PagSeguro\Enum\Authorization\PhoneEnum");
        }

        return true;
    }

    /**
     * @return integer
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param integer $areaCode
     *
     * @return Phone
     */
    public function setAreaCode($areaCode)
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param integer $number
     *
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
