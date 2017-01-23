<?php

namespace Parsers;

use SplFileObject;
use InvalidArgumentException;

/**
 * Parse a csv file
 *
 * Class ParserCsv
 * @package Parser
 */
class ParserCsv
{
    /**
     * Holds string of parsed items
     *
     * @var $_strItems
     */
    private $_strItems = '';

    /**
     * ParserCsv constructor.
     * Grab filename from cli parameter, call validation/parsing methods
     * @param $filename
     */
    public function __construct($filename)
    {
        // Validation
        $parser = new ParserValidate();
        if (!$parser->validate($filename, 'file', 'csv')) {
            throw new InvalidArgumentException("File not a csv file \n");
        }
    }

    /**
     * Parse csv and output data
     *
     * @param $filename
     * @return string
     */
    public function parse($filename)
    {
        $file = new SplFileObject($filename);
        $file->setFlags(SplFileObject::READ_CSV);

        foreach ($file as $row) {
            if (empty($row)) {
                continue;
            }
            list($id, $name, $quantity, $categories) = $row;

            $this->_strItems .= "$id $name ($quantity) \n";

            // Parse categories
            $cats = explode(';', $categories);
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

