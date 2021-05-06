<?php

namespace Electronics\Factory;


use Electronic\AbstractElectronicItem;

interface ElectronicItemFactoryInterface
{
    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return AbstractElectronicItem
     */
    public function create($price, $wired, array $extraList = []): AbstractElectronicItem;
}