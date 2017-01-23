#!/usr/bin/env php
<?php
/**
 * This file is a cli driver for a simple csv/xml/json parsing engine
 *
 * Usage CLI: php cli-driver.php <FILE-TYPE> <FILE-TO-BE-PARSED>
 * Example: php cli-driver.php xml assets/items.xml
 */

use Parsers\ParserCsv;
use Parsers\ParserXml;
use Parsers\ParserJson;

require_once __DIR__ . '/vendor/autoload.php';

// Grab cli params
$parserType = $argv[1];
$filename = $argv[2];

// Instantiate correct parser
switch ($parserType) {
    case 'csv':
        $parser = new ParserCsv($filename);
        break;
    case 'xml':
        $parser = new ParserXml($filename);
        break;
    case 'json':
        $parser = new ParserJson($filename);
        break;
}

// Parse and output
$parser->parse($filename);
echo $parser->output();
