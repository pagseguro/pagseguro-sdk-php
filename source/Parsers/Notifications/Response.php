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

namespace PagSeguro\Parsers\Notifications;
use PagSeguro\Domains\CreditorFees;
use PagSeguro\Domains\PaymentMethod;
use PagSeguro\Domains\Phone;
use PagSeguro\Domains\Shipping;
use PagSeguro\Helpers\InitializeObject;
use PagSeguro\Resources\Factory\Request\Sender;
use PagSeguro\Resources\Factory\Request\Shipping\Address;
use PagSeguro\Resources\Factory\Request\Shipping\Cost;
use PagSeguro\Resources\Factory\Request\Shipping\Type;

/**
 * Class Response
 * @package PagSeguro\Parsers\Refund
 */
class Response
{
    private $date;
    private $code;
    private $reference;
    private $type;
    private $status;
    private $lastEventDate;
    private $paymentMethod;
    private $grossAmount;
    private $discountAmount;
    private $creditorFees;
    private $netAmount;
    private $extraAmount;
    private $escrowEndDate;
    private $installmentCount;
    private $itemCount;
    private $items;
    private $sender;
    private $shipping;

    use \PagSeguro\Domains\Requests\Item;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Response
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditorFees()
    {
        return $this->creditorFees;
    }

    /**
     * @param mixed $creditorFees
     * @return Response
     */
    public function setCreditorFees($creditorFees)
    {
        $creditor = new CreditorFees();
        $creditor->setIntermediationRateAmount(current($creditorFees->intermediationRateAmount))
                 ->setIntermediationFeeAmount(current($creditorFees->intermediationFeeAmount));
        $this->creditorFees = $creditor;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Response
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscountAmount()
    {
        return $this->discountAmount;
    }

    /**
     * @param mixed $discountAmount
     * @return Response
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discountAmount = $discountAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEscrowEndDate()
    {
        return $this->escrowEndDate;
    }

    /**
     * @param mixed $escrowEndDate
     * @return Response
     */
    public function setEscrowEndDate($escrowEndDate)
    {
        $this->escrowEndDate = $escrowEndDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtraAmount()
    {
        return $this->extraAmount;
    }

    /**
     * @param mixed $extraAmount
     * @return Response
     */
    public function setExtraAmount($extraAmount)
    {
        $this->extraAmount = $extraAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
    }

    /**
     * @param mixed $grossAmount
     * @return Response
     */
    public function setGrossAmount($grossAmount)
    {
        $this->grossAmount = $grossAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstallmentCount()
    {
        return $this->installmentCount;
    }

    /**
     * @param mixed $installmentCount
     * @return Response
     */
    public function setInstallmentCount($installmentCount)
    {
        $this->installmentCount = $installmentCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItemCount()
    {
        return $this->itemCount;
    }

    /**
     * @param mixed $itemCount
     * @return Response
     */
    public function setItemCount($itemCount)
    {
        $this->itemCount = $itemCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     * @return Response
     */
    public function setItems($items)
    {
        foreach ($items->item as $value) {

            $this->addItems()->withParameters(
                current($value->id),
                current($value->description),
                current($value->quantity),
                current($value->amount)
            );
        }

        $this->items = current($this->getItems());
        return $this;
    }

    public function addItems()
    {
        $this->items = InitializeObject::Initialize(
            $this->items,
            new \PagSeguro\Resources\Factory\Request\Item
        );
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getLastEventDate()
    {
        return $this->lastEventDate;
    }

    /**
     * @param mixed $lastEventDate
     * @return Response
     */
    public function setLastEventDate($lastEventDate)
    {
        $this->lastEventDate = $lastEventDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @param mixed $netAmount
     * @return Response
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = $netAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     * @return Response
     */
    public function setPaymentMethod($paymentMethod)
    {
        $payment =  new PaymentMethod();
        $payment->setType(current($paymentMethod->type))->setCode(current($paymentMethod->code));
        $this->paymentMethod = $payment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return Response
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param mixed $sender
     * @return Response
     */
    public function setSender($sender)
    {
        $phone = new Phone();
        $phone->setAreaCode($sender->phone->areaCode)
              ->setNumber($sender->phone->number);

        $senderClass = new Sender();
        $senderClass->withParameters(
            current($sender->name),
            current($sender->email),
            current($phone->getAreaCode()),
            current($phone->getNumber()),
            null,
            null
        );
        $this->sender = $senderClass;
        return $this;
    }

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

        $shippingClass = new Shipping();

        $shippingAddress = new Address($shippingClass);

        $shippingAddress->withParameters(
            current($shipping->address->street),
            current($shipping->address->number),
            current($shipping->address->complement),
            current($shipping->address->district),
            current($shipping->address->postalCode),
            current($shipping->address->city),
            current($shipping->address->state),
            current( $shipping->address->country)
        );

        $shippingType = new Type($shippingClass);
        $shippingType->withParameters(current($shipping->type));

        $shippingCost = new Cost($shippingClass);
        $shippingCost->withParameters(current($shipping->cost));

        $this->shipping = $shippingClass;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Response
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return Response
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}
