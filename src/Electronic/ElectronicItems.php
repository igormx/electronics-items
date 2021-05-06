<?php

namespace Electronic;

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
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @param $type
     * @return bool
     */
    public function getSortedItems($type): bool
    {
        $sorted = array();
        $thisTypeItems = $this->getItemsByType($type);
        /** @var AbstractElectronicItem $item */
        foreach ($thisTypeItems as $item) {
            $sorted[($item->getPrice() * 100)] = $item;
        }
        return ksort($sorted, SORT_NUMERIC);
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
    public function getItems()
    {
        return $this->items;
    }
}