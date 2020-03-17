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
deleteRecord(($(this).attr("value")),"pracownicy");

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
     echo '<script src = "js/urlopliczenie.js"></script>';
    echo '<main>

    <div class="jumbotron mb-n4 bg-white">
            <div class="row mb-4">
            <div class="col">
            </div>
            <div class="col text-center">
            <form method="post" action="pracownicy_lista.php"><i class="fa fa-male"></i> <b>LISTA PRACOWNIKÓW</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <a href="pracownicy_lista_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase float-right dontprint"><i class="fa fa-plus" aria-hidden="true"></i> <i class="fa fa-male"></i> Dodaj pracownika</a>
            </div>
            </div>
';



                echo '</form>';

                        echo '<table class="table table-sm table-striped">
                              <thead>
                              <tr class="">
                                  <th scope="col">ID</th>
                                  <th scope="col">imię i nazwisko</th>
                                  <th scope="col">stanowisko</th>
                                  <th scope="col">kontakt</th>
                                  <th scope="col">UW na rok</th>
                                  <th scope="col">Adres</th>
                                  <th scope="col">Statystyka</th>

                                  <th colspan="2" scope="col" class="text-center dontprint"></th>
                                </tr>
                                </thead>
                              <tbody>
                                ';


      echo tabeladb2('15','SELECT * FROM pracownicy ORDER BY `id` ASC LIMIT 20', '<tr>', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td>', '5', '</td>',
      '<td>', '2', '</td>',
      '<td>', '6', '',
      '', '', '</td>',
      ' ', '', '',
      '<td>', '3', '</td>',
      '<td>', '8', '</td>',
      '<script>urlopliczenie("', '1', '");</script>',
      '', '', '',
      '', '', '',
      '<td class="text-center dontprint"><a href="pracownicy_lista_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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




/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
