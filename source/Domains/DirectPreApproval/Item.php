<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 03/08/2017
 * Time: 10:07
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Item
{
    public $id;
    public $description;
    public $quantity;
    public $amount;
    public $weight;
    public $shippingCost;

    public function withParameters($id, $description, $quantity, $amount, $weight = null, $shippingCost = null)
    {
        $this->id = $id;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->amount = $amount;
        $this->weight = $weight;
        $this->shippingCost = $shippingCost;

        return $this;
    }
}