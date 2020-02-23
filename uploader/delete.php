<?php
$subfolder = $_POST['subfolder']; /// do danego folderu np. moze byc id wpisu
$output_dir = "../uploads/".$subfolder."/";
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
{
	$fileName =$_POST['name'];
	$fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
	$filePath = $output_dir. $fileName;
	if (file_exists($filePath))
	{
		unlink($filePath);

		$items_count = count($output_dir);
		if ($items_count <= 2)
		{
			rmdir($output_dir);
		}
		else {
			$empty = false;
		}
    }
	echo "Deleted File ".$fileName."<br>";
}

?>