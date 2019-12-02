<?php
/*
   +----------------------------------------------------------------------+
   | Sobak User System 2                                                  |
   +----------------------------------------------------------------------+
   | www.forumweb.pl/a/b/487677                                           |
   +----------------------------------------------------------------------+
   | Ten plik jest częścią skryptu Sobak User System 2 <sobak.pl>         |
   | Integrowanie w treść tego komentarza stanowi naruszenie zasad, na    |
   | których udostępniono kod.                                            |
   +----------------------------------------------------------------------+
*/

require 'includes/config.php';
require 'includes/header.php';

if ($_POST) {
    // Zabezpiecz dane z formularza przed kodem HTML i ewentualnymi atakami SQL Injection
    // Nie ma konieczności filtrowania haseł, bo one i tak zostaną zahashowane przed wstawieniem
    // do bazy danych
    $login = $db->real_escape_string(htmlspecialchars(trim($_POST['login'])));
    $password = $_POST['password'];
    $passwordVerify = $_POST['password_v'];
    $email = $db->real_escape_string(htmlspecialchars(trim($_POST['email'])));
    $emailVerify = $db->real_escape_string(htmlspecialchars(trim($_POST['email_v'])));

    // Sprawdź czy podane przez użytkownika email lub login nie są zajęte
    $checkLogin = $db->query("SELECT COUNT(*) FROM users WHERE login = '$login'")->fetch_row();
    $checkEmail = $db->query("SELECT COUNT(*) FROM users WHERE email = '$email'")->fetch_row();

    // Podstawowa walidacja formularza
    $errors = array();

    if (empty($login) || empty($email) || empty($emailVerify) || empty($password) || empty($passwordVerify)) {
        $errors[] = 'Proszę wypełnić wszystkie pola';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Podany adres e-mail jest niepoprawny';
    }

    if ($checkLogin[0] > 0) {
        $errors[] = 'Ten login jest już zajęty';
    }
    if ($checkEmail[0] > 0) {
        $errors[] = 'Ten e-mail jest już używany';
    }

    if ($password != $passwordVerify) {
        $errors[] = 'Podane hasła się nie zgadzają';
    }
    if ($email != $emailVerify) {
        $errors[] = 'Podane adresy e-mail się nie zgadzają';
    }

    // Jeśli wystąpiły jakieś błędy, to je pokaż
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<p class="error">'.$error.'</p>';
        }
    } else {
        // Blędów nie ma, możemy kontynuować rejestrację

        $password = password_hash($password, PASSWORD_BCRYPT); // hashowanie hasła

        // Zapisz dane do bazy
        $result = $db->query("INSERT INTO users (login, email, password) VALUES('$login', '$email', '$password')");

        if (!$result) {
            echo '<p class="error">Wystąpił błąd przy rejestrowaniu użytkownika.<br>'.$db->error.'</p>';
        } else {
            echo '<p class="success">'.$login.', zostałeś zarejestrowany.
            <br><a href="login.php">Logowanie</a></p>';
        }
    }
}
?>

<form method="post" action="register.php">
    <label for="login">Login:</label>
    <input maxlength="32" type="text" name="login" id="login" required>

    <label for="password">Hasło:</label>
    <input type="password" name="password" id="password" required>

    <label for="password_v">Hasło (ponownie):</label>
    <input type="password" name="password_v" id="password_v" required>

    <label for="email">Email:</label>
    <input type="email" name="email" maxlength="255" id="email" required>

    <label for="email_v">Email (ponownie):</label>
    <input type="email" name="email_v" maxlength="255" id="email_v" required><br>

    <input type="submit" value="Zarejestruj">
</form>

<?php
require 'includes/footer.php';
