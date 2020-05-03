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
$filtr_3_rozmiar = '-2 my-2';
$filtr_3_text = 'ZAKOŃCZONE';
$filtr_3 = '<select name ="zakonczone" id="zakonczone" class="form-control form-control-sm">
<option value = "NIE">NIE</option>
<option value= ""></option>
<option value = "TAK">TAK</option>
</select>';



for ($x = 0; $x <= 3; $x++) {
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
        $zakonczone = (htmlspecialchars(trim($_POST['zakonczone'])));
        ////echo 'console.log("'.$zakonczone.'");';
        if($zakonczone == "NIE"){
          $zakonczone_i = ' AND data_k = ""';
          /////echo 'jQuery("#pole_zakonczone").html(" - zmiany niezakończone");';
        }else if($zakonczone == "TAK"){
          $zakonczone_i = ' AND data_k <> ""';
          /////echo 'jQuery("#pole_zakonczone").html(" - zmiany zakończone");';
        }else if ($zakonczone == ""){
          $zakonczone_i = "";
         ///// echo 'jQuery("#pole_zakonczone").html(" - zmiany zakończone i niezakończone");';
        }
        echo '$("#wpis_wzor").remove();';
        echo 'jQuery("#pole_jednos").html("'.$jednos.'");';
        echo 'jQuery("#pole_miesiac").html("'.$miesiac.'");';
        echo 'jQuery("#pole_rok").html("'.$rok.'");';
        echo 'var liczenie_liczba_zmian = 1;';
        echo tabeladb2('15','SELECT * FROM dziennik WHERE typ="zmiany czynszowe" AND YEAR(data_u) = '.$rok.' AND MONTH(data_u) = '.$miesiac.''.$zakonczone_i.' ORDER BY dziennik.id ASC', '', '',
        '$("#tabel_wykaz").append("<tr style=mso-yfti-irow:1;mso-yfti-lastrow:yes;height:49.45pt><td valign=top style=\u0022border:solid black 1.0pt;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=mso-bookmark:_Hlk29794814><b style=mso-bidi-font-weight:normal><span style=mso-bidi-font-size:12.0pt>', '', '"+liczenie_liczba_zmian+".<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '2', '<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '', '',
       '"+tylkosprawdzindeks("', '5', ' ',
       '', '6', '","',
       '', '7', '")+"<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '5', '',
       ' ', '6', '/',
       '', '7', '<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '9', '<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '4', '<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><b style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>', '', 'x<o:p></o:p></span></b></span></p></td>',
       '<span style=\u0022mso-bookmark:_Hlk29794814\u0022></span><td valign=top style=\u0022border-top:none;border-left:none;border-bottom:solid black 1.0pt; border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;  mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;  padding:0cm 5.4pt 0cm 5.4pt;height:49.45pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><span style=\u0022mso-bookmark:_Hlk29794814\u0022><span style=\u0022mso-bidi-font-weight:normal\u0022><span style=\u0022mso-bidi-font-size:12.0pt\u0022>Zmiana liczby osób zgodnie z pisemnym oświadczeniem użytkownika lokalu z dnia ', '2', '<o:p></o:p></span></span></span></p></td>',
       '', '', '',
       '', '', '',
       '', '', '</tr>");
       liczenie_liczba_zmian ++;'
      );

      };
      echo '
    });
});
});
var objsel = {
  "miesiac": "'.$miesiac.'",
  "rok": "'.$rok.'",
  "zakonczone": "'.$zakonczone.'"
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
                  </main>

                  <script src="js/tylkosprawdzindeks.js"></script>';





/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
