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
echo '
<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>
<!-- Custom styles for this template -->
<link href="css/signin.css" rel="stylesheet">
';

// Zabezpiecz zmienne odebrane z formularza, przed atakami SQL Injection
$login = $db->real_escape_string(htmlspecialchars(trim($_POST['login'])));
$password = $_POST['password'];

if ($_POST) {
    // Podstawowa walidacja formularza
    $errors = array();

    if (empty($login) || empty($password)) {
        $errors[] = 'Wypełnij wszystkie pola';
    }

    $auth = $user->auth($login, $password);
    if (!$auth) {
        $errors[] = 'Użytkownik o podanym loginie i haśle nie istnieje';
    }


    if (empty($errors)) {
        // Jeżeli nie ma błędów to przechodzimy dalej
        // Zapisujemy ID użytkownika do sesji i tym samym oznaczamy go jako zalogowanego
        $_SESSION['user_id'] = $auth;


header("Location: index.php");
die();
    } else {
        foreach ($errors as $error) {

            echo '<p id="error" class="error text-hide">'.$error.'</p>';
        }
    }
}
?>


 <form id="formularz_logowania" method="post" action="login.php" class="form-signin text-center">
  <img class="mb-4" src="img/logo.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Logowanie</h1>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
    </div>
    <input type="text" class="form-control" name="login" id="login" placeholder="Login">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
    </div>
    <input type="password" class="form-control" name="password" id="password" placeholder="Hasło">
  </div><div style="min-height : 65px">
  <div id="komunikat_blad" class=" mb-3 alert alert-danger text-hide"  role="alert">
            Uzupełnij login i hasło
  </div></div>
  <button id="przycisk_logowania" class="btn btn-lg text-light btn-block main-color" type="submit" disabled>Zaloguj</button>
  <p class="mt-5 mb-3 text-muted">domdo &copy; 2019</p>
</form>

<?php
require 'includes/footer.php';
?>

<script>

if ($('#error').length) {
                $("#komunikat_blad").fadeIn();
                $("#przycisk_logowania").prop("disabled", true);
                $("#komunikat_blad").removeClass("text-hide");
                $('#komunikat_blad').html($('#error').text());
            }

    //sprawdzanie czy wypełniono pole login i hasło są wypełnione
        $('#formularz_logowania').keyup( function() {
            if(($("#login").val() =='') || ($("#password").val() =='')) {
                $("#komunikat_blad").fadeIn();
                $("#przycisk_logowania").prop("disabled", true);
                $("#komunikat_blad").removeClass("text-hide");
                $('#komunikat_blad').html("Uzupełnij login i hasło");
            } else {
                $("#przycisk_logowania").prop("disabled", false);
                $("#komunikat_blad").fadeOut();
            }
        });
        </script>