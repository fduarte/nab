<?php

namespace Parsers;

use InvalidArgumentException;

class ParserXml
{
    /**
     * Holds string of parsed items
     *
     * @var $_strItems
     */
    private $_strItems = '';

    /**
     * ParserXml constructor.
     * Run basic validation
     * @param $filename
     */
    public function __construct($filename)
    {
        // Validation
        $parser = new ParserValidate();
        if (!$parser->validate($filename, 'file', 'xml')) {
            throw new InvalidArgumentException("File not a xml file \n");
        }
    }

    /**
     * Parse xml and output data
     *
     * @param $filename
     */
    public function parse($filename)
    {
        $xmlArray = simplexml_load_file($filename);

        foreach ($xmlArray as $xml) {
            $this->_strItems .= "$xml->id $xml->name ($xml->quantity) \n" ;

            // Parse categories
            $cats = explode(';', $xml->categories);
            if (!empty($cats)) {
                foreach ($cats as $cat) {
                    if (empty($cat)) {
                        continue;
                    }
                    $this->_strItems .= "- $cat \n";
                }
                $this->_strItems .= "\n";
            }
        }
    }

    /**
     * Returns final string of parsed items
     *
     * @return string
     */
    public function output()
    {
        return $this->_strItems;
    }
}


