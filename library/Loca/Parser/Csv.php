<?php
/**
 * FIXME implement SPL Iterator instead of having
 * custom getOne() and rewind() syntax
 */
class Loca_Parser_Csv extends Loca_Parser_Abstract {

    protected $_handle = NULL;
    protected $_headers = array();

    public function __construct($filename)
    {
        $this->_handle = fopen($filename, 'rb');
        $this->rewind();
    }

    public function __destruct()
    {
        if (is_resource($this->_handle)) {
            fclose($this->_handle);
        }
    }

    public function getOne()
    {
        $line = fgetcsv($this->_handle);
        if ($line === FALSE) {
            return NULL;
        }
        return $this->convertToAssoc($line);
    }

    public function rewind()
    {
        rewind($this->_handle);
        $this->_headers = fgetcsv($this->_handle);
    }

    protected function convertToAssoc($line)
    {
        $result = array();
        foreach ($line as $key => $value) {
                $result[$this->_headers[$key]] = $value;
        }
        return $result;
    }
}
