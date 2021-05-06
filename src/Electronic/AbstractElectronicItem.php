<?php

namespace Electronic;

use Electronic\Features\MaxExtrasInterface;
use Electronic\Features\PriceInterface;
use Electronic\Features\TypeInterface;

/**
 * Class AbstractElectronicItem
 *
 * Abstract class that defines the general behavior of an electronic item
 * @package Electronic
 */
abstract class AbstractElectronicItem implements PriceInterface, TypeInterface, MaxExtrasInterface
{
    /**@var float */
    private $price;

    /**@var string */
    private $type;

    /** @var bool */
    private $wired;

    /** @var array */
    private $extrasList;

    /**
     * AbstractElectronicItem constructor.
     * @param float $price
     * @param string $type
     * @param bool $wired
     * @param array $extrasList
     */
    public function __construct(float $price, string $type, bool $wired, array $extrasList = [])
    {
        $this->price = $price;
        $this->type = $type;
        $this->wired = $wired;
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
     * @param bool $wired
     */
    public function setWired($wired)
    {
        $this->wired = $wired;
    }

    /**
     * @return array
     */
    public function getExtrasList()
    {
        return $this->extrasList;
    }

    /**
     * @param array $extrasList
     */
    public function setExtrasList($extrasList)
    {
        $this->extrasList = $extrasList;
    }
}