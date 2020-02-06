<?php
<<<<<<< HEAD
$dir="../uploads";
=======
$subfolder = $_POST['subfolder']; /// do danego folderu np. moze byc id wpisu
$dir="../uploads/".$subfolder;
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
$files = scandir($dir);

$ret= array();
foreach($files as $file)
{
	if($file == "." || $file == "..")
		continue;
	$filePath=$dir."/".$file;
	$details = array();
	$details['name']=$file;
<<<<<<< HEAD
	$details['path']=$filePath;
=======
	$details['path']="uploads/".$subfolder."/".$file; /// do poprawienia
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
	$details['size']=filesize($filePath);
	$ret[] = $details;

}

echo json_encode($ret);
?>