<?php
/////////sprawdzanie czy folder wpisu istnieje, jeśli nie to go tworzy
$subfolder = $_POST['id_z']; /// do danego folderu np. moze byc id wpisu
$tresc = (trim($_POST['tresc']));
$output_dir = "../uploads/".$subfolder."/";
if (!file_exists('../uploads/'.$subfolder)) {
    mkdir('../uploads/'.$subfolder, 0777, true);/// jesli folder nie istnieje to utworz
}else {
    //// jesli folder istnieje
}
if(!empty($tresc)){
$plik = fopen($output_dir."testfile.html", "w");
fwrite($plik,$tresc);
  fclose($plik);
echo "ok";
};




?>