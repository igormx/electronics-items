<?php

namespace Electronic;

use Electronic\Factory\AbstractFactoryInterface;
use Electronic\Features\PriceInterface;

class ElectronicItems
{
    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    /** @var string[] */
    private static array $types = [
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER
    ];

    /** @var array */
    private array $items;

    /**
     * ElectronicItems constructor.
     * @param array $items
     * @param AbstractFactoryInterface $abstractFactory
     */
    public function __construct(array $items, AbstractFactoryInterface $abstractFactory)
    {
        $this->items = $abstractFactory->createElectronicItems($items);
    }

    /**
     * @param array $items
     * @return float
     */
    public function getPricing(array $items): float
    {
        $pricing = 0.0;
        /** @var AbstractElectronicItem $item */
        foreach ($items as $item) {
            if ($item instanceof PriceInterface) {
                $pricing += $item->getPrice();
            }
        }

        return $pricing;
    }

    /**
     * @return float
     */
    public function getTotalPricing(): float
    {
        $totalPricing = 0.0;
        /** @var AbstractElectronicItem $item */
        foreach ($this->getItems() as $item) {
            $extrasPricing = $this->getPricing($item->getExtrasList());
            $totalPricing += ($item->getPrice() + $extrasPricing);
        }

        return $totalPricing;
    }


    /**
     * @param string|null $type
     * @return array
     */
    public function getSortedItems(string $type = null): array
    {
        $sorted = [];
        if ($type === null) {
            $items = $this->getItems();
        } else {
            $items = $this->getItemsByType($type);
        }

        /** @var AbstractElectronicItem $item */
        foreach ($items as $item) {
            $extrasPricing = $this->getPricing($item->getExtrasList());
            $sorted[(($item->getPrice() + $extrasPricing) * 100)] = $item;
        }
        ksort($sorted, SORT_NUMERIC);
        return $sorted;
    }

    /**
     * Filters the Items by a type
     *
     * @param $type
     * @return array|false
     */
    public function getItemsByType($type)
    {
        if (in_array($type, self::$types)) {
            $callback = function (AbstractElectronicItem $item) use ($type) {
                return $item->getType() == $type;
            };
            return array_filter($this->getItems(), $callback);
        }
        return false;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}