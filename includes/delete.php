<?php
require 'config.php';
if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();

if (isset($_POST['delete'])) { //////// reszta na https://stackoverflow.com/questions/44455768/delete-mysql-row-from-jquery-ajax
    global $db;
    $idToDelete = intval($_POST['delete']);
    $fromTable = $_POST['tabela'];
    $sql        = "DELETE FROM ".$fromTable." WHERE id= ".$idToDelete;

    $stmt = $db->prepare($sql);

    if ($stmt->execute()) {
        echo "ok";
        ////dodatkowo usuwanie folderu wpisu w dzienniku
        if ($fromTable=="dziennik"){
            if (file_exists('../uploads/'.$idToDelete)) {
                array_map('unlink', glob("../uploads/".$idToDelete."/*.*"));
                rmdir('../uploads/'.$idToDelete);
            }
        }
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