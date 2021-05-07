<?php

namespace Electronic\Factory;


use Electronic\Item\Console;
use Electronic\Item\Controller;
use Electronic\Item\Microwave;
use Electronic\Item\Television;

interface AbstractFactoryInterface
{
    /**
     * @param array $items
     * @return array
     */
    public function createElectronicItems(array $items): array;

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Television
     */
    public function createTelevision($price, $wired, array $extraList = []): Television;

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Console
     */
    public function createConsole($price, $wired, array $extraList = []): Console;

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Microwave
     */
    public function createMicrowave($price, $wired, array $extraList = []): Microwave;

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Controller
     */
    public function createController($price, $wired, array $extraList = []): Controller;
}