<?php

namespace PagSeguro\Parsers\Transaction\Search;

abstract class Transactions
{
    /**
     * @var
     */
    private $date;
    /**
     * @var
     */
    private $code;
    /**
     * @var
     */
    private $reference;
    /**
     * @var
     */
    private $type;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Transactions
     */
    public function setCode($code)
    {
        $this->code = $code;
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
     * @return Transactions
     */
    public function setDate($date)
    {
        $this->date = $date;
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
     * @return Transactions
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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
     * @return Transactions
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
