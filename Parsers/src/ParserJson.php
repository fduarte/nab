<?php

namespace Parsers;

use InvalidArgumentException;

class ParserJson
{
    /**
     * Holds string of parsed items
     *
     * @var $_strItems
     */
    private $_strItems = '';

    /**
     * ParserJson constructor.
     * Run basic validation
     * @param $filename
     */
    public function __construct($filename)
    {
        // Validation
        $parser = new ParserValidate();
        if (!$parser->validate($filename, 'file', 'json')) {
            throw new InvalidArgumentException("File not a json file \n");
        }
    }

    /**
     * Parse json and output data
     *
     * @param $filename
     */
    public function parse($filename)
    {
        $jsonObj = json_decode(file_get_contents($filename));

        foreach ($jsonObj as $item) {
            $this->_strItems .= "$item->id $item->name ($item->quantity) \n";

            // Parse categories
            $cats = explode(';', $item->categories);
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

