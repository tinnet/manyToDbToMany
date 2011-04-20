<?php
require_once dirname(__FILE__) . '/Bootstrap.php';

$db = $registry['database'];

// TODO get project list from database
$projects = array(); // $db->get???

$viewUrl = '/viewProject.php?project=%s';
$uploadUrl = '/upload.php';

?>
<html>
<head><title>Choose Or Upload</title></head>
<body>

<p>Select a project to view:</p>
<?php
foreach ($projects as $project) {
    printf('<a href="%s">%s</a>', sprintf($viewUrl, $project), $project);
    echo '<br />';
}
?>

<p>Upload a file:</p>
<form enctype="multipart/form-data" action="<?php echo $uploadUrl ?>" method="POST">
    Choose...<input name="uploadedfile" type="file" /><br />
    <input type="submit" value="Upload" />
</form>

</body>
</html>
