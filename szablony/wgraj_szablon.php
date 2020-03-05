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
$nazwa_pliku = "pismo_".$subfolder."_".date("Y_m_d_h_i_s").".html";
$tresc = str_replace('src="szablony/','src="../../szablony/',$tresc);
$plik = fopen($output_dir.$nazwa_pliku, "w");
fwrite($plik, pack("CCC",0xef,0xbb,0xbf));

fwrite($plik,$tresc);
  fclose($plik);
echo "ok";
};




?>