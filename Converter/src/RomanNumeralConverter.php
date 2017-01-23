<?php

namespace RomanNumeralConverter;

/**
 * Convert a number to a roman numeral
 *
 * Example:
 * $o = new RomanNumeralConverter();
 * echo $o->convert(15); // XV
 *
 * Class RomanNumeralConverter
 * @package RomanNumeralConverter
 */
class RomanNumeralConverter
{
    private $romanNumerals = array(
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I',
    );

    /**
     * Convert a number to a roman numeral
     *
     * Logic: if the number_to_be_converted is bigger_or_equal than current roman_numeral_digit in
     * the romanNumerals array above, then append the corresponding roman_numeral do the finalNumeral string.
     * Next, the number_to_be_converted becomes the difference between itself and the roman_numeral_digit.
     *
     * Example:
     * number_to_be_converted is 3
     * Looping through the romanNumerals array we find that: 3 >= 1
     * So we append "I" to the $finalNumeral string
     * And make number_to_be_converted = 3 - 1
     * The loop/logic then repeats itself with the value of 2, and then 1
     * ending up with the final string of "III"
     *
     * @param $int
     * @return string
     */
    public function convert($int)
    {
        $finalNumeral = '';
        foreach($this->romanNumerals as $romanDigit => $romanNumeral){
            while ($int >= $romanDigit) {
                $finalNumeral .= $romanNumeral;
                $int -= $romanDigit;
            }
        }
        return $finalNumeral;
    }

    /**
     * Customize roman numerals
     *
     * @param $romanDigit
     * @param $romanNumeral
     */
    public function setRomanNumeral($romanDigit, $romanNumeral)
    {
        $this->romanNumerals[$romanDigit] = $romanNumeral;
    }

}
