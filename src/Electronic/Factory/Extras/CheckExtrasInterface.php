<?php

namespace Electronic\Factory\Extras;

/**
 * Interface CheckExtrasInterface
 * @package Electronic\Factory\Extras
 */
interface CheckExtrasInterface
{
    /**
     * Method used to check the extras attached to the electronic item
     *
     * @param string $className
     * @param array $extraList
     */
    public function checkExtras(string $className, array $extraList = []): void;
}