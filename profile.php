<?php
require 'includes/config.php';
require 'includes/header.php';

// Upewnij się że użytkownik jest zalogowany
if (!$user->check()) {
    echo '<p class="error">Przykro nam, ale ta strona jest dostępna tylko dla zalogowanych użytkowników.</p>';
    require 'includes/footer.php';
    die;
}

$id = odkodowanie($_GET['id']);
$profile = $user->data($id);

// Upewnij się, że użytkownik istnieje
if (empty($profile)) {
    echo '<p class="error">Przykro nam, ale użytkownik o podanym identyfikatorze nie istnieje.</p>';
        require 'includes/footer.php';
    die;
}

// Jeżeli skrypt doszedł do tego miejsca, to wszystko jest w porządku i można pokazać profil
?>
<h1>Profil użytkownika <?php echo $profile['login'] ?></h1>
<dl>
    <dt>Imię i Naziwsko:</dt> <dd><?php echo $profile['fullname'] ?></dd>
    <dt>Login:</dt> <dd><?php echo $profile['login'] ?></dd>
    <dt>E-mail:</dt> <dd><?php echo $profile['email'] ?></dd>
</dl>

<?php
require 'includes/footer.php';
