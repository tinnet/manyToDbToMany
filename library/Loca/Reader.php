<?php

interface Reader
{
    /**
     * @param string $filename
     */
    public function load($filename);
    public function rewind();
    public function getNext();
}
