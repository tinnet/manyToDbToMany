<?php

$config = array();
$config['db_path'] = dirname(__FILE__) . '/../data/';
$config['db_database'] = 'test123';

// TODO maybe handle this with an autoloader?
require_once dirname(__FILE__) . '/../library/Loca/Database/Sqlite.php'

$registry = array();
$registry['database'] = new Loca_Database_Sqlite($config);
