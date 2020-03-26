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
deleteRecord(($(this).attr("value")),"faktury");

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
            <form method="post" action="faktury.php"><i class="fa fa-money" aria-hidden="true"></i> <b>FAKTURY I MATERIAŁY</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
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
$filtr_0_text = 'TYP';
$filtr_0 = '<select name="typ" id="typ" class="form-control form-control-sm"><option></option>
'.tabeladb2('1','SELECT * FROM faktury_typy ORDER BY `id` ASC', '', '', '<option value=', '1', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
</select>';
$filtr_1_rozmiar = '-3';
$filtr_1_text = 'ROK';
$filtr_1 = '<select name="rok" id="rok" class="form-control form-control-sm">
<option value = '.(date('Y')).'>'.(date('Y')).'</option>
<option></option>
<option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
<option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
<option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
</select>';




for ($x = 0; $x <= 1; $x++) {

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

                        echo '<table id="tabela_gl" class="table table-sm table-striped">
                              <thead>
                              <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Numer Faktury</th>
                                  <th scope="col">Nazwa pozycji</th>
                                  <th scope="col">J.m.</th>
                                  <th scope="col">Ilość</th>
                                  <th scope="col">Wartość netto</th>
                                  <th scope="col">Wartość brutto</th>
                                  <th scope="col">Data</th>
                                  <th scope="col">Stawka VAT</th>
                                  <th scope="col">Typ</th>
                                  <th width="10%" scope="col">Uwagi</th>
                                  <th class="no-sort dontprint"></th>
                                  <th scope="col" class="text-center dontprint no-sort"><a href="faktury_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>pozycję</a>
                                  </th>
                                </tr>
                                </thead>
                              <tbody>
                                ';
                                if ($_POST) {
                                  $typ = (htmlspecialchars(trim($_POST['typ'])));
                                  $rok = (htmlspecialchars(trim($_POST['rok'])));


                  echo
                  '<script>

                  var objsel = {
                    "typ": "'.$typ.'",
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


                  if($typ){
                    $typ_i = ' AND typ = "'.$typ.'"';
                  }
                  if($rok){
                    $rok_i = ' AND YEAR(data) = "'.$rok.'"';
                  }



                      echo tabeladb2('15','SELECT * FROM faktury WHERE id IS NOT NULL'.$typ_i.''.$rok_i.' ORDER BY `id` ASC', '<tr class="text-center">', '</tr>',
                      '<td>', '0', '</td>',
                      '<td>', '1', '</td>',
                      '<td>', '2', '</td>',
                      '<td>', '3', '</td>',
                      '<td>', '4', '</td>',
                      '<td>', '5', '</td>',
                      '', '', '',

                      '<td>', '6', '</td>',
                      '<td>', '7', '</td>',
                      '<td>', '8', '</td>',
                      '<td>', '9', '</td>',
                      '<td class="small">', '10', '</td>',
                      '<td class="text-center dontprint text-nowrap"><a href="faktury_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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

      echo tabeladb2('15','SELECT * FROM faktury ORDER BY `id` DESC LIMIT 25', '<tr class="text-center">', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td><b>', '2', '</b></td>',
      '<td>', '3', '</td>',
      '<td>', '4', '</td>',
      '<td>', '5', '</td>',
      '', '', '',

      '<td>', '6', '</td>',
      '<td>', '7', '</td>',
      '<td>', '8', '</td>',
      '<td>', '9', '</td>',
      '<td class="small">', '10', '</td>',
      '<td class="text-center dontprint text-nowrap"><a href="faktury_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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
