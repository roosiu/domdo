<?php
$subfolder = $_POST['subfolder']; /// do danego folderu np. moze byc id wpisu
$dir="../uploads/".$subfolder;
$files = scandir($dir);

$ret= array();
foreach($files as $file)
{
	if($file == "." || $file == "..")
		continue;
	$filePath=$dir."/".$file;
	$details = array();
	$details['name']=$file;
	$details['path']=$filePath; /// do poprawienia
	$details['size']=filesize($filePath);
	$ret[] = $details;

}

echo json_encode($ret);
?>