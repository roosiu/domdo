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
deleteRecord(($(this).attr("value")),"kontakty");

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

            </div>
            <div class="col text-center">
            <form method="post" action="kontakty.php"><i class="fa fa-phone" aria-hidden="true"></i> <b>KONTAKTY </b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">

            </div>
            </div>
';


echo '</form>';




                echo '</form>';

                        echo '<table id="tabela_gl" class="table table-sm table-striped">
                              <thead>
                              <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Nazwa</th>
                                  <th scope="col">Adres</th>
                                  <th scope="col">Kontakt</th>
                                  <th scope="col">E-mail</th>
                                  <th scope="col">Strona WWW</th>
                                  <th scope="col">Info. dodatkowe</th>
                                  <th class="no-sort dontprint"></th>
                                  <th scope="col" class="text-center dontprint no-sort"><a href="kontakty_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>pozycję</a>
                                  </th>
                                </tr>
                                </thead>
                              <tbody>
                                ';


      echo tabeladb2('15','SELECT * FROM kontakty ORDER BY `id` DESC', '<tr class="text-center">', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td>', '2', '</td>',
      '<td>', '3', '</td>',
      '<td>', '4', '</td>',
      '<td>', '5', '</td>',
      '', '', '',

      '', '', '',
      '', '', '',
      '', '', '',
      '', '', '',
      '<td class="small">', '6', '</td>',
      '<td class="text-center dontprint text-nowrap"><a href="kontakty_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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
