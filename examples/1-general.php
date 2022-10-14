<?php

use Hutulia\DomainName\DomainName;

require_once dirname(__file__, 2) . '/vendor/autoload.php';

$domainName = new DomainName('example.com');

echo "Name: {$domainName->getName()}".PHP_EOL;
echo "Tld: {$domainName->getTld()}".PHP_EOL;
echo "Sld: {$domainName->getSld()}".PHP_EOL;
echo "Levels: ".implode(', ', $domainName->getLevels()).PHP_EOL;
echo "Levels count: ".$domainName->calcLevels().PHP_EOL;
var_dump($domainName->getLevels());
foreach ($domainName->getLevels() as $index => $levelData) {
    $level = $index+1;
    echo "Level {$level}: ".$levelData.PHP_EOL;
}
