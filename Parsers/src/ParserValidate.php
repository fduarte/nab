<?php

namespace Parsers;

use SplFileInfo;

class ParserValidate {

    /**
     * Basic file validation method
     *
     * Examples:
     * filePath: items.csv
     * type: file or dir
     * ext: txt
     *
     * @param $filename
     * @param $type
     * @param $ext
     * @return bool
     */
    public function validate($filename, $type, $ext)
    {
        $info = new SplFileInfo($filename);
        if (!file_exists($filename) ||
            $info->getType() != $type ||
            $info->getExtension() != $ext) {
            return false;
        }

        return true;
    }
}