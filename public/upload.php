<?php

require_once dirname(__FILE__) . '/Bootstrap.php';

$db = $registry['database'];

$fileName = $_FILES['uploadedfile']['name'];
$filePath = $_FILES['uploadedfile']['tmp_name'];

$parser = Loca_Parser::buildParser($fileName, $filePath);

// FIXME load a bunch of keys from file and bulk insert?
$key = $parser->getOne();
$count = 0;
while (!is_null($key)) {
    $db->saveKeyToProject($fileName, $key);
    $key = $parser->getOne();
    $count += 1;
}
unset($key);
?>
<html>
    <head><title>File Upload</title></head>
    <body>
    <?php var_dump($db->getAllKeysByProject($fileName)); ?>
    </body>
</html>
