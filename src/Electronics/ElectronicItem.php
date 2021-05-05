<?php

namespace Electronics;

class ElectronicItem
{
    /**@var float */
    private $price;

    /**@var string */
    private $type;

    /** @var bool */
    private $wired;

    /** @var array  */
    private $extrasList=[];

    /** @var int */
    private $maxExtras;

    /** @var bool */
    private $extra;

    /**
     * ElectronicItem constructor.
     * @param float $price
     * @param string $type
     * @param bool $wired
     * @param int $maxExtras
     * @param bool $extra
     * @param array $extrasList
     */
    public function __construct(float $price,string $type,bool $wired,int $maxExtras,bool $extra,array $extrasList=[])
    {
        $this->price = $price;
        $this->type = $type;
        $this->wired = $wired;
        $this->extra = $extra;
        $this->maxExtras = $maxExtras;
        $this->extrasList = $extrasList;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isWired()
    {
        return $this->wired;
    }

    /**
     * @return array
     */
    public function getExtrasList()
    {
        return $this->extrasList;
    }

    /**
     * @return int
     */
    public function getMaxExtras()
    {
        return $this->maxExtras;
    }

    /**
     * @return bool
     */
    public function isExtra()
    {
        return $this->extra;
    }
}