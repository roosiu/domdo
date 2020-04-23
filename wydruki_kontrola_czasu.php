<?php

require 'includes/config.php';
require 'includes/header.php';



if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();
    /// pobieranie menu
    require 'includes/menu.php';
     /// część main


    echo '<main>

    <div class="jumbotron mb-n4 bg-white">
            <div class="row mb-4 dontprint">
            <div class="col">
            </div>
            <div class="col text-center">
            <form method="post" action="wydruki_kontrola_czasu.php"><i class="fa fa-print" aria-hidden="true"></i> <b>LISTA OBECNOŚCI</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="submit" id="przycisk_generuj" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-magic" aria-hidden="true"></i> Generuj</button>
            <button type="button" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść </button>

            </div>
            </div>
<script>
jQuery(function(){




  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
    $(function () {
      $.get("wydruki_kontrola_czasu_podglad.htm", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center">';
$filtr_0_rozmiar = '- my-2';
$filtr_0_text = 'PRACOWNIK nr 1';
$filtr_0 = '<select name="pracownik_1" id="pracownik_1" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_1_rozmiar = '- my-2';
$filtr_1_text = 'PRACOWNIK nr 2';
$filtr_1 = '<select name="pracownik_2" id="pracownik_2" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_2_rozmiar = '- my-2';
$filtr_2_text = 'PRACOWNIK nr 3';
$filtr_2 = '<select name="pracownik_3" id="pracownik_3" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_3_rozmiar = '- my-2';
$filtr_3_text = 'PRACOWNIK nr 4';
$filtr_3 = '<select name="pracownik_4" id="pracownik_4" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_4_rozmiar = '- my-2';
$filtr_4_text = 'PRACOWNIK nr 5';
$filtr_4 = '<select name="pracownik_5" id="pracownik_5" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_5_rozmiar = '- my-2';
$filtr_5_text = 'PRACOWNIK nr 6';
$filtr_5 = '<select name="pracownik_6" id="pracownik_6" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_6_rozmiar = '- my-2';
$filtr_6_text = 'PRACOWNIK nr 7';
$filtr_6 = '<select name="pracownik_7" id="pracownik_7" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';
$filtr_7_rozmiar = '-2 my-2';
$filtr_7_text = 'MIESIĄC';
$filtr_7 = '<select name="miesiac" id="miesiac" class="form-control form-control-sm">
<option value = '.(date('m')).'>'.(date('m')).'</option>
<option></option>
<option value=01>01</option>
<option value=02>02</option>
<option value=03>03</option>
<option value=04>04</option>
<option value=05>05</option>
<option value=06>06</option>
<option value=07>07</option>
<option value=08>08</option>
<option value=09>09</option>
<option value=10>10</option>
<option value=11>11</option>
<option value=12>12</option>
</select>';
$filtr_8_rozmiar = '-2 my-2';
$filtr_8_text = 'ROK';
$filtr_8 = '<select name ="rok" id="rok" class="form-control form-control-sm">
<option value = '.(date('Y')).'>'.(date('Y')).'</option>
<option></option>
<option value = '.(date('Y', strtotime(" +1 year"))).'>'.(date('Y', strtotime(" +1 year"))).'</option>
<option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
<option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
<option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
</select>';
$filtr_9_rozmiar = '-3 my-2';
$filtr_9_text = 'JEDNOSTKA ORGANIZACYJNA';
$filtr_9 = '<input type="text" class="form-control form-control-sm" id="jednos" name="jednos" value="
'.pojed_zapyt('SELECT nazwa_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'">';



for ($x = 0; $x <= 9; $x++) {
if($x==7){
  echo '</div><div id="div_filtr_2" class="row mb-3 dontprint justify-content-center">';
}
  echo ' <div class="col-sm'.${filtr_.$x._rozmiar}.' px-1">
  <div class="card bg-light">
  <div class="card-body p-2">
      <h6 class="card-title text-center">'.${filtr_.$x._text}.'</h6>
      <div class="card-text">
      '.${filtr_.$x}.'
      </div>

    </div>
  </div>
</div>';}

echo '</div></form>';




                echo '</form>';









                   echo' <script src="js/editor.js"></script>
<script>
$(document).ready(function() {
  $("#txtEditor").Editor();

  $(function () {
    $.get("wydruki_kontrola_czasu_podglad.htm", function (data) {
      $(".Editor-editor").html(data);';

      if ($_POST) {
        $jednos = (htmlspecialchars(trim($_POST['jednos'])));
        echo 'jQuery("#pole_jednos").html("'.$jednos.'");';
        $miesiac = (htmlspecialchars(trim($_POST['miesiac'])));
        echo 'jQuery("#pole_miesiac").html("'.$miesiac.'");';
        $rok = (htmlspecialchars(trim($_POST['rok'])));
        echo 'jQuery("#pole_rok").html("'.$rok.'");';

          for ($i = 1; $i <= 7; $i++) {
            ${'pracownik_'.$i} = (htmlspecialchars(trim($_POST['pracownik_'.$i])));
            echo 'jQuery("#pole_nazwisko_'.$i.'").html("'.${'pracownik_'.$i}.'");';
          }
      };
      echo '
    });
});
});
</script>
<div class="container"><textarea id="txtEditor"></textarea></div>
                  </main>';





/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
