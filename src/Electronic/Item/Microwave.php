<?php


namespace Electronic\Item;


use Electronic\AbstractElectronicItem;
use Electronic\Features\MaxExtrasInterface;

class Microwave extends AbstractElectronicItem implements MaxExtrasInterface
{
    /**
     * Get the maxExtras of the electronic
     * @return bool
     */
    public static function maxExtras()
    {
        return false;
    }
}