<?php
require 'config.php';
if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();

if (isset($_POST['delete'])) { //////// reszta na https://stackoverflow.com/questions/44455768/delete-mysql-row-from-jquery-ajax

    $idToDelete = intval($_POST['delete']);
    $sql        = "DELETE  FROM table1 WHERE id= ?";

    $stmt = $con->prepare($sql);
    $stmt->bin_param("i", $idToDelete);

    if ($stmt->execute()) {
        echo "ok";
    } else {

        echo "Error : " . $con->error;
    }
}
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
?>