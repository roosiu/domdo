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
            <form method="post" action="#"><i class="fa fa-print" aria-hidden="true"></i> <b>LISTA OBECNOŚCI</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="button" id="przycisk_generuj" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-magic" aria-hidden="true"></i> Generuj</button>
            <button type="button" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść </button>

            </div>
            </div>
<script>
jQuery(function(){

  $("#nr_kol").on("change", function() {

    kto_przypis = $(this).find("option:selected").val();
    $("#pracownik").val(kto_przypis).change();

  });
  $("#pracownik").on("change", function() {
    $("#nr_kol").find("option:selected").val($("#pracownik").find("option:selected").text());

  });

  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
    $(function () {
      $.get("wydruki_lista_obecnosci_podglad.html", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });

  jQuery("#przycisk_generuj").click(function () {
    $("#jednos_wart").html($("#jednos").val());
    $("#mies_rok").html("m-c:"+$("#miesiac").val()+" rok"+$("#rok").val());

    for (i = 1; i < 11; i++) {
      if($.isNumeric($("#nr_kol option:contains("+i+")").val())) { } else {
      console.log($("#nr_kol option:contains("+i+")").val());
      $("#nazwisko_"+i).html($("#nr_kol option:contains("+i+")").val());
      }
    }

  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center">';
$filtr_0_rozmiar = '-1';
$filtr_0_text = 'NR KOL';
$filtr_0 = '<select name="nr_kol" id="nr_kol" class="form-control form-control-sm">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
</select>';
$filtr_1_rozmiar = '-2';
$filtr_1_text = 'PRACOWNIK';
$filtr_1 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
$filtr_2_rozmiar = '-2';
$filtr_2_text = 'MIESIĄC';
$filtr_2 = '<select name="miesiac" id="miesiac" class="form-control form-control-sm">
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
$filtr_3_rozmiar = '-2';
$filtr_3_text = 'ROK';
$filtr_3 = '<select name ="rok" id="rok" class="form-control form-control-sm">
<option value = '.(date('Y')).'>'.(date('Y')).'</option>
<option></option>
<option value = '.(date('Y', strtotime(" +1 year"))).'>'.(date('Y', strtotime(" +1 year"))).'</option>
<option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
<option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
<option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
</select>';
$filtr_4_rozmiar = '-3';
$filtr_4_text = 'JEDNOSTKA ORGANIZACYJNA';
$filtr_4 = '<input type="text" class="form-control form-control-sm" id="jednos" name="jednos" value="
Administracja Osiedli Rejonowych A3 - Osiedle w Gniewkowie">';
$filtr_5_rozmiar = '-2';
$filtr_5_text = 'OPCJE';
$filtr_5 = '<label class="form-control form-control-sm"><input type="checkbox" id="sob_niedz" checked/> Zakreśl soboty i niedziele</label><label class="form-control form-control-sm"><input type="checkbox" id="dni_nie" checked/> Zakreśl dni nieistniejące</label>';



for ($x = 0; $x <= 5; $x++) {

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
    $.get("wydruki_lista_obecnosci_podglad.html", function (data) {
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
