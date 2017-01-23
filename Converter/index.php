<?php

require_once __DIR__ . '/vendor/autoload.php';

use RomanNumeralConverter\RomanNumeralConverter;

// Instantiate roman numeral converter
$o = new RomanNumeralConverter();

// Optional setting of roman numerals
// $o->setRomanNumeral(1, 'Z');
// $o->setRomanNumeral(5, 'P');
?>

<ul>
    <li>15 in Roman Numerals is: <?= $o->convert(15); ?></li>
    <li>153 in Roman Numerals is: <?= $o->convert(153); ?></li>
    <li>1509 in Roman Numerals is: <?= $o->convert(1509); ?></li>
</ul>

