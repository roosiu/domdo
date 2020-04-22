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

  function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}

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
      $.get("wydruki_kontrola_czasu_podglad.htm", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });

  jQuery("#przycisk_generuj").click(function () {

		for (x=1;x<=31;x++) {

			$(".dzien_"+x).html(" ");


		}
    $("#jednos_wart").html($("#jednos").val());
    $("#mies_rok").html("m-c:"+$("#miesiac").val()+" rok:"+$("#rok").val());

    for (i = 1; i < 11; i++) {
      if($.isNumeric($("#nr_kol option:contains("+i+")").val())) { } else {

      $("#nazwisko_"+i).html($("#nr_kol option:contains("+i+")").val());
      }
    }


    if ($("#dni_nie").checked = $("#dni_nie").is(":checked")) {
			var rokj = $("#rok").val();
			var miesiacj = $("#miesiac").val();
			var dni_mies = daysInMonth(miesiacj,rokj);
        for (y=(dni_mies+1);y<=31;y++) {
          $(".dzien_"+y).html("XXXXX");

        }
    }

		else
		{

    }


    jQuery(function(e) {
        if ( $("#sob_niedz").checked =  $("#sob_niedz").is(":checked")) {
				var d = new Date();

				var miesiacj = $("#miesiac").val();
				var rokj = $("#rok").val();


var d = new Date();
var getTot = daysInMonth(d.getMonth(),d.getFullYear());
var sat = new Array();
var sun = new Array();

for(var i=1;i<=getTot;i++){
  var newDate = new Date(rokj,miesiacj-1,i)

  if(newDate.getDay()==0){
      sat.push(i)
      $(".dzien_"+(i)).html("----------");
  }
  if(newDate.getDay()==6){
      sun.push(i)
      $(".dzien_"+(i)).html("----------");
  }
}




		}
		else
		{








		}

    });


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
</select>';
$filtr_1_rozmiar = '-';
$filtr_1_text = 'PRACOWNIK';
$filtr_1 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', "<option value='", "1", "'>", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>

';
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
'.pojed_zapyt('SELECT nazwa_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'">';



for ($x = 0; $x <= 4; $x++) {

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
