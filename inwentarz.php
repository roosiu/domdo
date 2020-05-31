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
deleteRecord(($(this).attr("value")),"inwentarz");

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
            <form method="post" action="inwentarz.php"><i class="fa fa-building" aria-hidden="true"></i> <b>INWENTARZ</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
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
$filtr_0_text = 'GRUPA';
$filtr_0 = '<select name="grupa" id="grupa" class="form-control form-control-sm"><option></option>
'.tabeladb2('1','SELECT * FROM inwentarz_grupy ORDER BY `id` ASC', '', '', '<option value="', '1', '">', '', '1', '</option>', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '').'
</select>';
$filtr_1_rozmiar = '-1';
$filtr_1_text = 'WARTOŚĆ OD';
$filtr_1 = '<input type="number" step="0.01" name="wartosc_od" class="form-control form-control-sm hasDatepicker" id="wartosc_od">';
$filtr_2_rozmiar = '-1';
$filtr_2_text = 'WARTOŚĆ DO';
$filtr_2 = '<input type="number" step="0.01" name="wartosc_do" class="form-control form-control-sm hasDatepicker" id="wartosc_do">';
$filtr_3_rozmiar = '-2';
$filtr_3_text = 'PRACOWNIK';
$filtr_3 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
$filtr_4_rozmiar = '-2';
$filtr_4_text = 'ZLIKWIDOWANE';
$filtr_4 = '<select name="zlikwidowane" id="zlikwidowane" class="form-control form-control-sm"><option></option><option value="tak">tak</option><option value="nie">nie</option></select>';




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

                        echo '<table id="tabela_gl" class="table table-sm table-striped table-hover">
                              <thead>
                              <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Nr inw.</th>
                                  <th scope="col">Nazwa pozycji</th>
                                  <th scope="col">Grupa</th>
                                  <th scope="col">Lokalizacja</th>
                                  <th scope="col">Nr dow. wyd.</th>
                                  <th scope="col">Ilość</th>
                                  <th scope="col">Data</th>
                                  <th scope="col">Przypisane</th>
                                  <th scope="col">Wartość netto/ewid.</th>
                                  <th width="col" scope="col">Zlikwidowano</th>
                                  <th class="no-sort dontprint"></th>
                                  <th scope="col" class="text-center dontprint no-sort"><a href="inwentarz_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>pozycję</a>
                                  </th>
                                </tr>
                                </thead>
                              <tbody>
                                ';
                                if ($_POST) {
                                  $grupa = (htmlspecialchars(trim($_POST['grupa'])));
                                  $pracownik = (htmlspecialchars(trim($_POST['pracownik'])));
                                  $zlikwidowane = (htmlspecialchars(trim($_POST['zlikwidowane'])));
                                  $wartosc_od = (htmlspecialchars(trim($_POST['wartosc_od'])));
                                  $wartosc_do = (htmlspecialchars(trim($_POST['wartosc_do'])));



                  echo
                  '<script>

                  var objsel = {
                    "grupa": "'.$grupa.'",
                    "zlikwidowane": "'.$zlikwidowane.'",
                    "pracownik": "'.$pracownik.'"
                  };
                  var objinp = {
                    "wartosc_od": "'.$wartosc_od.'",
                    "wartosc_do": "'.$wartosc_do.'",
                  };
                  $.each( objinp, function( select, value ) {
                    $("#"+select).val(value);
                    $("#naglowek_dziennik").append(" | "+select+": <i>"+value+"</i>" );

                  });
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


                  if($grupa){
                    $grupa_i = ' AND grupa = "'.$grupa.'"';
                  }

                  if($pracownik){
                    $pracownik_i = ' AND przypisane_do = "'.pojed_zapyt('SELECT imieinazwisko FROM pracownicy WHERE `id` ='.$pracownik).'"';

                  }

                  if($zlikwidowane == 'nie'){
                    $zlikwidowane_i = ' AND zlikwidowano = 0000-00-00';
                  } else if($zlikwidowane == 'tak'){
                    $zlikwidowane_i = ' AND zlikwidowano > 0000-00-00';
                  }

                  if($wartosc_od){
                    $wartosc_od_i = ' AND wartosc_ewid >=  "'.str_replace( ",", ".", $wartosc_od).'"';
                  }
                  if($wartosc_do){
                    $wartosc_do_i = ' AND wartosc_ewid <=  "'.str_replace( ",", ".", $wartosc_do).'"';
                  }


                      echo tabeladb2('15','SELECT * FROM inwentarz WHERE id IS NOT NULL'.$grupa_i.''.$pracownik_i.''.$zlikwidowane_i.''.$wartosc_od_i.''.$wartosc_do_i.' ORDER BY `id` ASC', '<tr class="text-center">', '</tr>',
                      '<td>', '0', '</td>',
                      '<td>', '1', '</td>',
                      '<td><b>', '2', '</b></td>',
                      '<td>', '3', '</td>',
                      '<td>', '4', '</td>',
                      '<td>', '5', '</td>',

                      '<td>', '6', '</td>',
                      '<td>', '7', '</td>',
                      '<td>', '8', '</td>',
                      '<td>', '9', '',
                      '/', '10', '</td>',
                      '<td>', '11', '</td>',
                      '<td class="text-center dontprint text-nowrap"><a href="inwentarz_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
                     '<td class="text-center dontprint text-nowrap"><button id="', '0', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
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

      echo tabeladb2('15','SELECT * FROM inwentarz ORDER BY `id` DESC LIMIT 25', '<tr class="text-center">', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td><b>', '2', '</b></td>',
      '<td>', '3', '</td>',
      '<td>', '4', '</td>',
      '<td>', '5', '</td>',

      '<td>', '6', '</td>',
      '<td>', '7', '</td>',
      '<td>', '8', '</td>',
      '<td>', '9', '',
      '/', '10', '</td>',
      '<td>', '11', '</td>',
      '<td class="text-center dontprint text-nowrap"><a href="inwentarz_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
     '<td class="text-center dontprint text-nowrap"><button id="', '0', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
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
    var td_z_data_likwid = $(this).find("td:eq(10)");
    if(td_z_data_likwid.text()=="0000-00-00"){
      td_z_data_likwid.text("");
    }else if (td_z_data_likwid.text() > "0000-00-00"){

      $(this).css("text-decoration", "line-through");
    }
  });

$("#tabela_gl").DataTable( {
  "pageLength": 25,
  "order": [[ 0, "desc" ]],
  "columnDefs": [ {
    "targets": "no-sort",
    "orderable": false,
} ]
} );
$(".dataTables_length").addClass("dontprint");
$(".dataTables_paginate").addClass("dontprint");
$(".dataTables_filter").addClass("dontprint");

});
</script>';
echo '
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css"/>

<script type="text/javascript" src="js/datatables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>';



/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
