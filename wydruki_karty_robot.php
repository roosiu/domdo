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
            <form method="post" action="#"><i class="fa fa-print" aria-hidden="true"></i> <b>KARTY ROBÓT </b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="button" id="przycisk_generuj" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-magic" aria-hidden="true"></i> Generuj</button>
            <button type="button" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść </button>

            </div>
            </div>
<script>
jQuery(function(){



  $("#pracownik").on("change", function() {
    $("#nr_kol").find("option:selected").val($("#pracownik").find("option:selected").text());

  });

  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
    $(function () {
      $.get("wydruki_karty_robot_podglad.html", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });


  jQuery("#przycisk_generuj").click(function () {

        $("#pole_nazwiska").html(($("#pracownik").val())+", dzień..............................");
        $("#pole_nazwiska2").html(($("#pracownik").val())+", dzień..............................");


  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center">';

$filtr_0_rozmiar = '-3';
$filtr_0_text = 'PRACOWNIK';
$filtr_0 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
';



for ($x = 0; $x <= 0; $x++) {

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
    $.get("wydruki_karty_robot_podglad.html", function (data) {
      $(".Editor-editor").html(data)
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
