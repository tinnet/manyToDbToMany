<?php

class Loca_Parser {

    // FIXME there are diffrent kinds of csv/xml...
    protected static $parserMap = array(
        '/\.csv$/' => 'Loca_Parser_Csv',
        '/\.xml$/' => 'Loca_Parser_Xml',
    );


    public static function buildParser($fileName, $filePath)
    {
        foreach(static::$parserMap as $pattern => $parserClassName) {
            if (!preg_match($pattern, $fileName)) {
                continue;
            }

            return new $parserClassName($filePath);
        }
        throw new Exception(sprintf('No parser found for file >%s<', $fileName));
    }

}

