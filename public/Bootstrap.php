<?php

// FIXME configure this somewhere else
$config = array();
$config['db_path'] = dirname(__FILE__) . '/../data/';


// FIXME maybe handle this with an autoloader?
// see: https://gist.github.com/221634
require_once dirname(__FILE__) . '/../library/Loca/Database.php';
require_once dirname(__FILE__) . '/../library/Loca/Database/Serialized.php';
// TODO real database implementation!?

require_once dirname(__FILE__) . '/../library/Loca/Exporter/Json.php';
// TODO require_once dirname(__FILE__) . '/../library/Loca/Exporter/Tmx.php';

require_once dirname(__FILE__) . '/../library/Loca/Parser.php';
require_once dirname(__FILE__) . '/../library/Loca/Parser/Abstract.php';
require_once dirname(__FILE__) . '/../library/Loca/Parser/Csv.php';
require_once dirname(__FILE__) . '/../library/Loca/Parser/Xml.php';

$registry = array();
$registry['database'] = new Loca_Database_Serialized($config);

$registry['parser'] = new Loca_Parser($config);

// TODO make the different exporters selectable
$registry['exporter'] = new Loca_Exporter_Json($config);
//$registry['exporter'] = new Loca_Exporter_Tmx($config);
