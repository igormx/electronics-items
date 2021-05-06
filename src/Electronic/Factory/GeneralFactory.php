<?php


namespace Electronics\Factory;


use Electronic\Item\Television;
use ErrorException;

class GeneralFactory
{
    /**
     * @throws ErrorException
     */
    public static function createElectronicItems(array $items)
    {
        $electronicItems=[];
        foreach ($items as $key => $item) {
            if (!key_exists('type', $item) || !key_exists('price', $item) || !key_exists('wired', $item)) {
                throw new ErrorException("Invalid item #{$key} definition");
            }

            if (!is_float($item['price'])) {
                throw new ErrorException("Invalid price for item #{$key}");
            }

            if (!is_bool($item['wired'])) {
                throw new ErrorException("Invalid wired for item #{$key}");
            }

            switch ($item['type']) {
                case 'television': {
                    $electronicItems[] = TelevisionFactory::
                    break;
                }
            }

        }

        return $electronicItems;
    }

}