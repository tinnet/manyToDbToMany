<?php

require_once dirname(__FILE__) . '/Bootstrap.php';

if (isset($_REQUEST['project'])) {
    $project = $_REQUEST['project'];
} else {
    $project = NULL;
}

$exportUrl = '/export.php?project=%s';

$db = $registry['database'];
?>

<html>
<title><?php echo $project ?></title>
</head>
</body>
<?php
if (is_null($project)) {
    echo 'Error: no Project was choosen.<br/>';
    $keys = array();
} else {
    printf('<p>Project: %s</p><br/>', $project);
    $keys = $db->getAllKeysByProject($project);
}

if (!empty($keys)) {
    printf(
        '<a href="%s">Export this project</a><br/>',
        sprintf($exportUrl, $project)
    );
}
?>
<hr/>
<?php
foreach ( $keys as $key) {
// TODO print all keys in a table or with pretty css layouting
}
?>
</body>
</html>
