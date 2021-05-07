<?php

namespace Electronic\Item;


use Electronic\AbstractElectronicItem;
use Electronic\Features\MaxExtrasInterface;

class Console extends AbstractElectronicItem implements MaxExtrasInterface
{
    /**
     * Get the maxExtras of the electronic
     * @return int
     */
    public static function maxExtras()
    {
        return 4;
    }
}