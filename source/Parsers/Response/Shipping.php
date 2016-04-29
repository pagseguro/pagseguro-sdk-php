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

namespace PagSeguro\Parsers\Response;

use PagSeguro\Resources\Factory\Shipping\Address;
use PagSeguro\Resources\Factory\Shipping\Cost;
use PagSeguro\Resources\Factory\Shipping\Type;

/**
 * Class Shipping
 * @package PagSeguro\Parsers\Response
 */
trait Shipping
{

    /**
     * @var
     */
    private $shipping;

    /**
     * @return mixed
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param mixed $shipping
     * @return Response
     */
    public function setShipping($shipping)
    {
        $shippingClass = new \PagSeguro\Domains\Shipping();

        $shippingAddress = new Address($shippingClass);

        $shippingAddress->withParameters(
            current($shipping->address->street),
            current($shipping->address->number),
            current($shipping->address->complement),
            current($shipping->address->district),
            current($shipping->address->postalCode),
            current($shipping->address->city),
            current($shipping->address->state),
            current($shipping->address->country)
        );

        $shippingType = new Type($shippingClass);
        $shippingType->withParameters(current($shipping->type));

        $shippingCost = new Cost($shippingClass);
        $shippingCost->withParameters(current($shipping->cost));

        $this->shipping = $shippingClass;
        return $this;
    }
}
