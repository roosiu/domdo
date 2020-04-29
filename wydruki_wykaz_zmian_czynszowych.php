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
            <form method="post" action="wydruki_wykaz_zmian_czynszowych.php"><i class="fa fa-print" aria-hidden="true"></i> <b>WYKAZ ZMIAN CZYNSZOWYCH</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
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
      $.get("wydruki_wykaz_zmian_czynszowych_podglad.htm", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center">';

$filtr_0_rozmiar = '-2 my-2';
$filtr_0_text = 'MIESIĄC';
$filtr_0 = '<select name="miesiac" id="miesiac" class="form-control form-control-sm">
<option value = '.(date('m')).'>'.(date('m')).'</option>
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
$filtr_1_rozmiar = '-2 my-2';
$filtr_1_text = 'ROK';
$filtr_1 = '<select name ="rok" id="rok" class="form-control form-control-sm">
<option value = '.(date('Y')).'>'.(date('Y')).'</option>
<option value = '.(date('Y', strtotime(" +1 year"))).'>'.(date('Y', strtotime(" +1 year"))).'</option>
<option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
<option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
<option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
</select>';
$filtr_2_rozmiar = '-3 my-2';
$filtr_2_text = 'JEDNOSTKA ORGANIZACYJNA';
$filtr_2 = '<input type="text" class="form-control form-control-sm" id="jednos" name="jednos" value="
'.pojed_zapyt('SELECT nazwa_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'">';



for ($x = 0; $x <= 2; $x++) {
if($x==7){
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
    $.get("wydruki_wykaz_zmian_czynszowych_podglad.htm", function (data) {
      $(".Editor-editor").html(data);';

      if ($_POST) {
        $jednos = (htmlspecialchars(trim($_POST['jednos'])));
        $miesiac = (htmlspecialchars(trim($_POST['miesiac'])));
        $rok = (htmlspecialchars(trim($_POST['rok'])));

        echo 'jQuery("#pole_jednos").html("'.$jednos.'");';
        echo 'jQuery("#pole_miesiac").html("'.$miesiac.'");';
        echo 'jQuery("#pole_rok").html("'.$rok.'");';

          for ($i = 1; $i <= 7; $i++) {
            ${'pracownik_'.$i} = (htmlspecialchars(trim($_POST['pracownik_'.$i])));
            echo 'jQuery("#pole_nazwisko_'.$i.'").html("'.${'pracownik_'.$i}.'");';
            if(${'pracownik_'.$i}){
              if($miesiac){
                $miesiac_i = ' AND miesiac = "'.$miesiac.'"';
              }
              if($rok){
                $rok_i = ' AND rok = "'.$rok.'"';
              }
              echo 'jQuery("#pole_stanowisko_'.$i.'").html("'.pojed_zapyt('SELECT stanowisko FROM pracownicy WHERE `imieinazwisko` = "'.${'pracownik_'.$i}.'"').'");';
              echo ' var str = "'.pojed_zapyt('SELECT godziny FROM kontrola_czasu_pracy WHERE `pracownik` = "'.${'pracownik_'.$i}.'"'.$miesiac_i.''.$rok_i.'').'";
              str = str.replace(/:9/g, "").replace(/:8/g, "").replace(/:7/g, "").replace(/:6/g, "").replace(/:5/g, "").replace(/:4/g, "").replace(/:3/g, "").replace(/:2/g, "").replace(/:1/g, "").replace(/undefined/g, "X");
              wynik = str.split(";");
              var suma = "0";
              for (j = 0; j < 31; ++j) {

                jQuery("#pole_godziny_'.$i.'_"+(j+1)).html(wynik[j]);

                if($.isNumeric(wynik[j])){
                  suma = parseFloat(suma) + parseFloat(wynik[j]);
                  jQuery("#pole_godziny_'.$i.'_32").html(suma);
                }else
                {
                  jQuery("#pole_godziny_'.$i.'_"+(j+1)).parent().addClass( "small" );
                }

              };
              ';
            } else {
              echo 'jQuery("#pole_stanowisko_'.$i.'").html("");';

            }

          }

      };
      echo '
    });
});
});
var objsel = {
  "miesiac": "'.$miesiac.'",
  "rok": "'.$rok.'"
};
var objinp = {
  "jednos": "'.$jednos.'"
};
$.each( objsel, function( select, value ) {
  $(function() {
    $("[name="+select+"] option").filter(function() {
        return ($(this).val() == value);
      }).prop("selected", true);
      if(value == ""){  }
      else {

        $("#naglowek_dziennik").append(" | "+select+": <i>"+($("#"+select+" option:selected").text())+"</i>" );
      };
    })
  });

  $.each( objinp, function( select, value ) {
    if(value == ""){  }
    else {
    $("input[name="+select+"]").val(value);
    $("#naglowek_dziennik2").append(" | "+select+": <i>"+($("input[name="+select+"]").val())+"</i>");
    };
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
