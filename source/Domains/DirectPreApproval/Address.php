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

namespace PagSeguro\Domains\DirectPreApproval;

/**
 * Class Address
 *
 * @package PagSeguro\Domains\DirectPreApproval
 */
class Address
{
    /**
     * @var
     */
    public $street;
    /**
     * @var
     */
    public $number;
    /**
     * @var
     */
    public $district;
    /**
     * @var
     */
    public $postalCode;
    /**
     * @var
     */
    public $city;
    /**
     * @var
     */
    public $state;
    /**
     * @var
     */
    public $country;
    /**
     * @var
     */
    public $complement;

    /**
     * @param      $street
     * @param      $number
     * @param      $district
     * @param      $postalCode
     * @param      $city
     * @param      $state
     * @param      $country
     * @param null $complement
     *
     * @return $this
     */
    public function withParameters(
        $street,
        $number,
        $district,
        $postalCode,
        $city,
        $state,
        $country,
        $complement = null
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->district = $district;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
        $this->complement = $complement;

        return $this;
    }
}