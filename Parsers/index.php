<?php
/**
 * Simple front end file that displays the parsed csv file
 */

require_once __DIR__ . '/vendor/autoload.php';

use Parsers\ParserCsv;

$filename = 'assets/items.csv';
$csv = new ParserCsv($filename);
$csv->parse($filename);
echo str_replace("\n", "<br>", $csv->output());


