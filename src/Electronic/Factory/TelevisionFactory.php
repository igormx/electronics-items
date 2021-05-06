<?php


namespace Electronics\Factory;


use Electronic\Item\Television;
use ErrorException;

class TelevisionFactory implements ElectronicItemFactoryInterface
{
    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Television
     * @throws ErrorException
     */
    public function create($price, $wired, array $extraList = []): Television
    {
        if (count($extraList) > Television::maxExtras()) {
            throw new ErrorException("MaxExtras exceeded!");
        }

        return new Television($price, "television", $wired, $extraList);
    }
}