<?php

namespace Electronic\Features;

interface MaxExtrasInterface
{
    /**
     * Get the max extras of the electronic item
     *
     * @return int|bool
     */
    public static function maxExtras();
}