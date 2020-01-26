<?php
require 'config.php';
if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();

if (isset($_GET['nowy'])) { //////// reszta na https://stackoverflow.com/questions/44455768/delete-mysql-row-from-jquery-ajax
    global $db;
    $zapyt_mysql = intval($_GET['nowy']);
   $fromTable = $_GET['tabela'];
   /// $sql2        = "DELETE FROM ".$fromTable." WHERE id= ".$idToDelete;

    $sql = "INSERT INTO ".$fromTable." (data_p, data_u, data_k, tresc, ulica, nr_ulicy, nr_lokalu, typ, zglasza, kontakt, zlecono)
    VALUES ('675', '675', '675', '675', 'ulica', 'nr_ulicy', 'nr_lokalu', 'typ', 'zglasza', 'kontakt', 'zlecono')";

    $stmt = $db->prepare($sql);
    if(!$stmt){
        echo "Prepare failed: (". $db->errno.") ".$db->error."<br>";
     }
    if ($stmt->execute()) {
        echo "ok";
    } else {

        echo "Error : " . $db->error;
    }
}
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
?>