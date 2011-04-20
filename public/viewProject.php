<?php
require_once './Bootstrap.php'

if (isset($_REQUEST['project']) {
    $project = $_REQUEST['project'];
} else {
    $project = NULL;
}

$db = $registry['database'];
?>

<html>
<title><?php echo $project ?></title>
</head>
</body>
<?php
if (is_null($project)) {
    echo 'Error: no Project was choosen.<br/>';
} else {
    $keys = $db->getAllKeysByProject($project);
    foreach ($key as $key) {
        // TODO print all keys in a pretty table or with css layout
    }
}
?>
</body>
</html>
