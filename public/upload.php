<?php

require_once dirname(__FILE__) . '/Bootstrap.php';

$db = $registry['database'];

$db->getAllProjects();
var_dump($db->getAllProjects());

?>
<html><head><title>File Upload</title></head><body></body></html>
