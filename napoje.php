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
deleteRecord(($(this).attr("value")),"napoje");

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
            <form method="post" action="napoje.php"><i class="fa fa-coffee" aria-hidden="true"></i> <b>NAPOJE I PRZYDZIAŁ</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
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
                                  <th scope="col">Numer Faktury</th>
                                  <th scope="col">Data zakupu</th>
                                  <th scope="col">Ilość</th>
                                  <th scope="col">J.m.</th>
                                  <th scope="col">Wartość</th>
                                  <th scope="col">Pobrał</th>
                                  <th scope="col">Data wydania</th>
                                  <th scope="col">Ilość</th>
                                  <th scope="col">Temperatura</th>
                                  <th scope="col">Uwagi</th>
                                  <th scope="col">Podpis</th>

                                  <th colspan="2" scope="col" class="text-center dontprint"><a href="napoje_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>pobranie</a>
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
                    $pracownik_i = ' AND napoje.pobral = "'.pojed_zapyt('SELECT imieinazwisko FROM pracownicy WHERE `id` ='.$pracownik).'"';
                  }
                  if($miesiac){
                    $miesiac_i = ' AND MONTH(napoje.data_wydania) = "'.$miesiac.'"';
                  }
                  if($rok){
                    $rok_i = ' AND YEAR(napoje.data_wydania) = "'.$rok.'"';
                  }


                      echo tabeladb2('18','SELECT * FROM faktury, napoje WHERE faktury.numer_faktury=napoje.numer_faktury AND faktury.typ="napoje" '.$pracownik_i.''.$miesiac_i.''.$rok_i.' ORDER BY napoje.id DESC', '<tr class="text-center">', '</tr>',
                      '<td>', '11', '</td>',
                      '<td class="td_z_numerem_fakt">', '1', '</td>',
                      '<td>', '7', '</td>',
                      '<td>', '4', '</td>',
                      '<td>', '3', '</td>',
                      '<td>', '6', '</td>',
                      '<td>', '13', '</td>',
                      '<td>', '16', '</td>',
                      '<td>', '14', '</td>',
                      '<td>', '15', '°c</td>',
                      '<td>', '17', '</td>',
                      '<td></td><td class="text-center dontprint"><a href="napoje_edytuj.php?id=', '11', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
                    '<td class="text-center dontprint"><button id="', '11', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
                    '<div class="dialog-confirm" id="dialog-confirm-', '11', '" title="Potwierdzenie usuwania"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Czy napewno usunąć wpis? Przywrócenie go nie będzie możliwe</p>',
                    '<button value="', '11', '" class="click-del-confirm btn btn-danger btn-sm text-uppercase text-white"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button>
                    <button class="btn btn-dark btn-sm dialog_cancel float-right text-uppercase">anuluj</button>
                    </div>',
                    '', '', '',
                    '', '', ''
                    );

                     echo '
                     </tbody>
                              </table>



                  </div>


                  </main>';

                  } else

                  {

      echo tabeladb2('15','SELECT * FROM faktury, napoje WHERE faktury.numer_faktury=napoje.numer_faktury AND faktury.typ="napoje" AND MONTH(napoje.data_wydania) = '.date('m').' AND YEAR(napoje.data_wydania) = '.date('Y').'  ORDER BY napoje.id DESC', '<tr class="text-center">', '</tr>',
      '<td>', '11', '</td>',
      '<td class="td_z_numerem_fakt">', '1', '</td>',
      '<td>', '7', '</td>',
      '<td>', '4', '</td>',
      '<td>', '3', '</td>',
      '<td>', '6', '</td>',
      '<td>', '13', '</td>',
      '<td>', '16', '</td>',
      '<td>', '14', '</td>',
      '<td>', '15', '°c</td>',
      '<td>', '17', '</td>',
      '<td></td><td class="text-center dontprint"><a href="napoje_edytuj.php?id=', '11', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
     '<td class="text-center dontprint"><button id="', '11', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
     '<div class="dialog-confirm" id="dialog-confirm-', '11', '" title="Potwierdzenie usuwania"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Czy napewno usunąć wpis? Przywrócenie go nie będzie możliwe</p>',
     '<button value="', '11', '" class="click-del-confirm btn btn-danger btn-sm text-uppercase text-white"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button>
     <button class="btn btn-dark btn-sm dialog_cancel float-right text-uppercase">anuluj</button>
     </div>',
     '', '', '',
     '', '', ''
    );

     echo '
     </tbody>
              </table>



  </div>

  </main>';


};




/// koniec części main
echo '<script>';
echo 'var zuzyto_faktury = {';
echo tabeladb2('12','SELECT faktury.numer_faktury, Sum(napoje.ilosc), faktury.ilosc FROM faktury, napoje WHERE faktury.numer_faktury=napoje.numer_faktury AND faktury.typ="napoje" AND YEAR(faktury.data) >= "'.date('Y', strtotime(" -3 year")).'"  group by faktury.numer_faktury', '', '", ',
'', '', '',
'"', '0', '": "',
'', '1', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', ''

);
echo ' };';
echo '
$(window).on("load", function() {

  $("table:first tr").each(function(){

    if($(this).find("td:eq(1)").text() == $(this).next("tr").find("td:eq(1)").text()
    ){
      $(this).next("tr").find("td:eq(1)").addClass("duplikat");
      $(this).next("tr").find("td:eq(2)").addClass("duplikat");
      $(this).next("tr").find("td:eq(3)").addClass("duplikat");
      $(this).next("tr").find("td:eq(4)").addClass("duplikat");
      $(this).next("tr").find("td:eq(5)").addClass("duplikat");
    }


  });

  $(".duplikat").html("");


      $.each( zuzyto_faktury, function( select, value ) {
              if(value == ""){  }
            else {
                $( ".td_z_numerem_fakt" ).each(function() {
                  if ($(this).text() == select){
                    pozostalo_nap = ($( this ).parent().find("td:eq(3)").text()) - value;
                  $( this ).parent().find("td:eq(3)").append("<br/><span class=dontprint> pozostało: "+pozostalo_nap+"</span>");

                  }
                });
            };
      });
});

';

echo   '</script>';
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
