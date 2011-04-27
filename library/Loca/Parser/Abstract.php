<?php

abstract class Loca_Parser_Abstract {
    public abstract function __construct($filename);
    
    public abstract function getOne();

    public abstract function rewind();
}
