<?php

require_once dirname(__FILE__) . '/Bootstrap.php';

if (isset($_REQUEST['project'])) {
    $project = $_REQUEST['project'];
} else {
    echo 'Error: no project given!<br/>';
    exit();
}

$db = $registry['database'];
$exporter = $registry['exporter'];

// FIXME this loads ALL keys into RAM, is this wise?
// maybe the $exporter could get them one by one from the $db?
$keys = $db->getAllKeysByProject($project);

echo $exporter->export($keys);
