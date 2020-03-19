<?php

require 'includes/config.php';
require 'includes/header.php';

echo '
<script>
$( function() {
  $( ".dialog-confirm" ).dialog({
    autoOpen: false,
    resizable: false,
    height: "auto",
    width: "350",
    modal: true,
    show: {
      effect: "fade",
      duration: 300
    },
    hide: {
      effect: "fade",
      duration: 300
    }

  });
  $( ".click-del" ).on( "click", function() {

    $("#dialog-confirm-"+$(this).attr("id")).dialog( "open" );
    $(this).parent("td").parent("tr").addClass("bg-warning");
  });
  $( ".click-del-confirm" ).on( "click", function() {
deleteRecord(($(this).attr("value")),"kontrola_czasu_pracy");

  });
  $( ".dialog_cancel" ).on( "click", function() {
    $("tr").removeClass("bg-warning");
    $(this).parent("div").dialog( "close" );

  });

} );
</script>
';

if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();
    /// pobieranie menu
    require 'includes/menu.php';
     /// część main
    echo '<main>

    <div class="jumbotron mb-n4 bg-white">
            <div class="row mb-4">
            <div class="col">
            <button type="button" id="but_div_filtr" class="btn btn-dark btn-sm text-uppercase float-left dontprint"><i class="fa fa-eye-slash" aria-hidden="true"></i> Pokaż/Ukryj filtry</button>
            </div>
            <div class="col text-center">
            <form method="post" action="pracownicy_kontrola_czasu.php"><i class="fa fa-clock-o" aria-hidden="true"></i> <b>KONTROLA CZASU PRACY</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="submit" id="przycisk_filtr" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" style="display: none"><i class="fa fa-filter" aria-hidden="true"></i> Filtruj</button>
            <button type="reset" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" style="display: none"><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść filtry</button>

            </div>
            </div>
<script>
jQuery(function(){
  jQuery("#but_div_filtr").click(function () {
    jQuery("#div_filtr").toggle("slow");
    jQuery("#przycisk_filtr").toggle("slow");
    jQuery("#przycisk_filtr_wyczysc").toggle("slow");
  });
  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center" style="display: none">';
$filtr_0_rozmiar = '-3';
$filtr_0_text = 'PRACOWNIK';
$filtr_0 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
$filtr_1_rozmiar = '-2';
$filtr_1_text = 'MIESIĄC';
$filtr_1 = '<select name="miesiac" id="miesiac" class="form-control form-control-sm">
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
$filtr_2_rozmiar = '-2';
$filtr_2_text = 'ROK';
$filtr_2 = '<select name ="rok" id="rok" class="form-control form-control-sm">
<option value = '.(date('Y')).'>'.(date('Y')).'</option>
<option></option>
<option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
<option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
<option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
</select>';



for ($x = 0; $x <= 2; $x++) {

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

                        echo '<table class="table table-sm table-striped">
                              <thead>
                              <tr class="text-center">
                                  <th scope="col">ID</th>
                                  <th scope="col">Miesiąc</th>
                                  <th scope="col">Rok</th>
                                  <th scope="col">Imię i nazwisko</th>
                                  <th scope="col">1</th>
                                  <th scope="col">2</th>
                                  <th scope="col">3</th>
                                  <th scope="col">4</th>
                                  <th scope="col">5</th>
                                  <th scope="col">6</th>
                                  <th scope="col">7</th>
                                  <th scope="col">8</th>
                                  <th scope="col">9</th>
                                  <th scope="col">10</th>
                                  <th scope="col">11</th>
                                  <th scope="col">12</th>
                                  <th scope="col">13</th>
                                  <th scope="col">14</th>
                                  <th scope="col">15</th>
                                  <th scope="col">16</th>
                                  <th scope="col">17</th>
                                  <th scope="col">18</th>
                                  <th scope="col">19</th>
                                  <th scope="col">20</th>
                                  <th scope="col">21</th>
                                  <th scope="col">22</th>
                                  <th scope="col">23</th>
                                  <th scope="col">24</th>
                                  <th scope="col">25</th>
                                  <th scope="col">26</th>
                                  <th scope="col">27</th>
                                  <th scope="col">28</th>
                                  <th scope="col">29</th>
                                  <th scope="col">30</th>
                                  <th scope="col">31</th>
                                  <th scope="col">Razem godzin</th>
                                  <th scope="col">Statystyka</th>

                                  <th colspan="2" scope="col" class="text-center dontprint"><a href="pracownicy_kontrola_czasu_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>rozliczenie</a>
                                  </th>
                                </tr>
                                </thead>
                              <tbody>
                                ';
                                if ($_POST) {
                                  $pracownik = (htmlspecialchars(trim($_POST['pracownik'])));
                                  $miesiac = (htmlspecialchars(trim($_POST['miesiac'])));
                                  $rok = (htmlspecialchars(trim($_POST['rok'])));

                  echo
                  '<script>

                  var objsel = {
                    "pracownik": "'.$pracownik.'",
                    "miesiac": "'.$miesiac.'",
                    "rok": "'.$rok.'"
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



                  jQuery("#div_filtr").toggle("fast");
                  jQuery("#przycisk_filtr").toggle("fast");
                  jQuery("#przycisk_filtr_wyczysc").toggle("fast");


                  </script>';


                  if($pracownik){
                    $pracownik_i = ' AND pracownik = "'.pojed_zapyt('SELECT imieinazwisko FROM pracownicy WHERE `id` ='.$pracownik).'"';
                  }
                  if($miesiac){
                    $miesiac_i = ' AND miesiac = "'.$miesiac.'"';
                  }
                  if($rok){
                    $rok_i = ' AND rok = "'.$rok.'"';
                  }


                      echo tabeladb2('15','SELECT * FROM kontrola_czasu_pracy WHERE id IS NOT NULL'.$pracownik_i.''.$miesiac_i.''.$rok_i.' ORDER BY `id` DESC', '<tr class="text-center">', '</tr>',
                      '<td>', '0', '</td>',
                      '<td>', '1', '</td>',
                      '<td>', '2', '</td>',
                      '<td>', '3', '</td>',
                      '<input type="hidden" id="dni_', '0', '" value="',
                      ' ', '4', '">',
                      '', '', '',

                      '<td>', '', '</td>',
                      '<td>', '8', '</td>',
                      '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>', '', '',
                      '', '', '',
                      '', '', '',
                      '<td class="text-center dontprint"><a href="pracownicy_kontrola_czasu_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
                     '<td class="text-center dontprint"><button id="', '0', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
                     '<div class="dialog-confirm" id="dialog-confirm-', '0', '" title="Potwierdzenie usuwania"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Czy napewno usunąć wpis? Przywrócenie go nie będzie możliwe</p>',
                     '<button value="', '0', '" class="click-del-confirm btn btn-danger btn-sm text-uppercase text-white"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button>
                     <button class="btn btn-dark btn-sm dialog_cancel float-right text-uppercase">anuluj</button>
                     </div>'
                    );
                     echo '
                     </tbody>
                              </table>



                  </div>


                  </main>';

                  } else

                  {

      echo tabeladb2('15','SELECT * FROM kontrola_czasu_pracy WHERE `miesiac` = '.date("m").' AND `rok` = '.date("Y").' ORDER BY `id` DESC', '<tr class="text-center">', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td>', '2', '</td>',
      '<td>', '3', '</td>',
      '<input type="hidden" id="dni_', '0', '" value="',
      ' ', '4', '">',
      '', '', '',

      '<td>', '', '</td>',
      '<td>', '8', '</td>',
      '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>', '', '',
      '', '', '',
      '', '', '',
      '<td class="text-center dontprint"><a href="pracownicy_kontrola_czasu_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
     '<td class="text-center dontprint"><button id="', '0', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
     '<div class="dialog-confirm" id="dialog-confirm-', '0', '" title="Potwierdzenie usuwania"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Czy napewno usunąć wpis? Przywrócenie go nie będzie możliwe</p>',
     '<button value="', '0', '" class="click-del-confirm btn btn-danger btn-sm text-uppercase text-white"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button>
     <button class="btn btn-dark btn-sm dialog_cancel float-right text-uppercase">anuluj</button>
     </div>'
    );

     echo '
     </tbody>
              </table>



  </div>


  </main>';};
  echo'
<script>
$(window).on("load", function() {
  $("table:first tr").each(function(){
    var id_do_spr_dir = $(this).find("button:last").attr("id");
   var td_do_dodania_ikony = $(this).find("td:eq(4)");
    if($.isNumeric(id_do_spr_dir))
      {
        var str = $("#dni_"+id_do_spr_dir).val();
        str = str.replace(/:/g, "<br/>");
        wynik = str.split(";");
        var suma = "0";
        if( str.indexOf("UW") != -1 ) {uw = (str.match(/UW/g)).length;} else {uw = "0";}
        if( str.indexOf("CH") != -1 ) {ch = (str.match(/CH/g)).length;} else {ch = "0";}
        if( str.indexOf("WN") != -1 ) {wn = (str.match(/WN/g)).length;} else {wn = "0";}
        if( str.indexOf("NP") != -1 ) {np = (str.match(/NP/g)).length;} else {np = "0";}
        if( str.indexOf("NP") != -1 ) {np = (str.match(/NP/g)).length;} else {np = "0";}
        if( str.indexOf("UOK") != -1 ) {uok = (str.match(/UOK/g)).length;} else {uok = "0";}
        if( str.indexOf("OP") != -1 ) {op = (str.match(/OP/g)).length;} else {op = "0";}




        $(this).find("td:eq(36)").html("|UW:"+uw+"|CH:"+ch+"|WN:"+wn+"|<br/>|NP:"+np+"|UOK:"+uok+"|OP:"+op+"|");

        for (i = 0; i < 31; ++i) {

          if(wynik[i] != "undefined"){
            $(this).find("td:eq("+(i+4)+")").append(wynik[i]);
            if($.isNumeric(wynik[i])){
              suma = parseFloat(suma) + parseFloat(wynik[i]);
              $(this).find("td:eq(35)").html(suma);
            }else
            {
              $(this).find("td:eq("+(i+4)+")").addClass( "small text-center" );
            }
          }
          else
          {
           $(this).find("td:eq("+(i+4)+")").append("x");
          };

        }
      }
    });

});
</script>';



/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
