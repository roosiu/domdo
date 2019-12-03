<?php


require 'includes/config.php';
require 'includes/header.php';

if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();
    /// pobieranie menu
    require 'includes/menu.php';
    require 'includes/mainpage.php';
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
/// includowanie stopki
require 'includes/footer.php';
