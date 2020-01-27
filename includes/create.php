<?php
require 'config.php';
if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();

if (isset($_POST['nowy'])) { //////// reszta na https://stackoverflow.com/questions/44455768/delete-mysql-row-from-jquery-ajax
    global $db;
    $zapyt_mysql = $_POST['nowy'];



  $sql = $zapyt_mysql;
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