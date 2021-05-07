<?php

namespace Electronic\Factory;

use Electronic\Factory\Extras\CheckExtrasInterface;
use Electronic\Item\Console;
use Electronic\Item\Controller;
use Electronic\Item\Microwave;
use Electronic\Item\Television;
use ErrorException;

/**
 * Class GeneralFactory
 * @package Electronics\Factory
 */
class GeneralFactory implements AbstractFactoryInterface, CheckExtrasInterface
{
    /**
     * @param array $items
     * @return array
     * @throws ErrorException
     */
    public function createElectronicItems(array $items): array
    {
        $electronicItems = [];
        foreach ($items as $key => $item) {
            if (!key_exists('type', $item) || !key_exists('price', $item) || !key_exists('wired', $item) || !key_exists('extraList', $item)) {
                throw new ErrorException("Invalid item #$key definition");
            }

            if (!is_numeric($item['price'])) {
                throw new ErrorException("Invalid price for item #$key");
            } else {
                $item['price']=floatval($item['price']);
            }

            if (!is_bool($item['wired'])) {
                throw new ErrorException("Invalid wired for item #$key");
            }

            if (!is_array($item['extraList'])) {
                throw new ErrorException("Invalid extraList for item #$key");
            }

            switch ($item['type']) {
                case 'television':
                {
                    $electronicItems[] = $this->createTelevision($item['price'], $item['wired'], $item['extraList']);
                    break;
                }
                case 'console':
                {
                    $electronicItems[] = $this->createConsole($item['price'], $item['wired'], $item['extraList']);
                    break;
                }
                case 'microwave':
                {
                    $electronicItems[] = $this->createMicrowave($item['price'], $item['wired'], $item['extraList']);
                    break;
                }
                case 'controller':
                {
                    $electronicItems[] = $this->createController($item['price'], $item['wired'], $item['extraList']);
                    break;
                }
                default:
                {
                    throw new ErrorException("Invalid item type! #$key");
                }
            }
        }

        return $electronicItems;
    }

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Television
     * @throws ErrorException
     */
    public function createTelevision($price, $wired, array $extraList = []): Television
    {
        $this->checkExtras(Television::class, $extraList);
        $extras=$this->createElectronicItems($extraList);
        return new Television($price, "television", $wired, $extras);
    }

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Console
     * @throws ErrorException
     */
    public function createConsole($price, $wired, array $extraList = []): Console
    {
        $this->checkExtras(Console::class, $extraList);
        $extras=$this->createElectronicItems($extraList);
        return new Console($price, "console", $wired, $extras);
    }

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Microwave
     * @throws ErrorException
     */
    public function createMicrowave($price, $wired, array $extraList = []): Microwave
    {
        $this->checkExtras(Microwave::class, $extraList);
        $extras=$this->createElectronicItems($extraList);
        return new Microwave($price, "microwave", $wired, $extras);
    }

    /**
     * @param $price
     * @param $wired
     * @param array $extraList
     * @return Controller
     * @throws ErrorException
     */
    public function createController($price, $wired, array $extraList = []): Controller
    {
        $this->checkExtras(Controller::class, $extraList);
        $extras=$this->createElectronicItems($extraList);
        return new Controller($price, "controller", $wired, $extras);
    }

    /**
     * @param string $className
     * @param array $extraList
     * @throws ErrorException
     */
    public function checkExtras(string $className, array $extraList = []): void
    {
        $maxExtras = call_user_func([$className, "maxExtras"]);
        if (is_bool($maxExtras)) {
            if($maxExtras===true) {
                //No Max
                return;
            } else {
                $maxExtras=0;
            }
        }

        if (count($extraList) > $maxExtras) {
            throw new ErrorException($className." MaxExtras exceeded!");
        }
    }
}