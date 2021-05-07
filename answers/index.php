<?php

use Electronic\AbstractElectronicItem;

require __DIR__ . "/../vendor/autoload.php";

$myItems = [
    [
        'type' => "console",
        'price' => 300.50,
        'wired' => false,
        'extraList' => [
            ['type' => "controller", 'price' => 0, 'wired' => false, 'extraList' => []],
            ['type' => "controller", 'price' => 0, 'wired' => false, 'extraList' => []],
            ['type' => "controller", 'price' => 3, 'wired' => true, 'extraList' => []],
            ['type' => "controller", 'price' => 3, 'wired' => true, 'extraList' => []],
        ]
    ],
    [
        'type' => "television",
        'price' => 243.75,
        'wired' => false,
        'extraList' => [
            ['type' => "controller", 'price' => 5, 'wired' => false, 'extraList' => []],
            ['type' => "controller", 'price' => 5, 'wired' => false, 'extraList' => []],
        ]
    ],
    [
        'type' => "television",
        'price' => 463.80,
        'wired' => false,
        'extraList' => [
            ['type' => "controller", 'price' => 5, 'wired' => false, 'extraList' => []],
        ]
    ],
    [
        'type' => "microwave",
        'price' => 145.60,
        'wired' => false,
        'extraList' => []
    ],
];

try {
    $electronicItems = new Electronic\ElectronicItems($myItems, new \Electronic\Factory\GeneralFactory());

    echo "Answer 1:" . PHP_EOL;
    echo "-------------------------------------------------------------" . PHP_EOL;
    /** @var AbstractElectronicItem $item */
    foreach ($electronicItems->getSortedItems() as $price => $item) {
        echo $item->getType() . " pricing including extras: $" . ($price / 100) . PHP_EOL;
    }
    echo PHP_EOL . "Total Pricing: $" . $electronicItems->getTotalPricing() . PHP_EOL;

    echo PHP_EOL."Answer 2:" . PHP_EOL;
    echo "-------------------------------------------------------------" . PHP_EOL;
    $consoleItems = $electronicItems->getSortedItems("console");
    $consolePrices = array_keys($consoleItems);
    echo "console pricing including extras: $" . ($consolePrices[0] / 100) . PHP_EOL;
} catch (ErrorException $errorException) {
    echo "Error: " . $errorException->getMessage() . PHP_EOL;
}
