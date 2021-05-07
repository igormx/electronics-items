<?php

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
    dump($electronicItems->getSortedItems());
    dump($electronicItems->getTotalPricing());
} catch (ErrorException $errorException) {
    echo "Error: " . $errorException->getMessage() . PHP_EOL;
}
