<?php

namespace Electronic\Features;

interface PriceInterface
{
    /**
     * Get the Price of the electronic item
     *
     * @return float
     */
    public function getPrice();
}