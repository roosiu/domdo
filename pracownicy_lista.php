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
deleteRecord(($(this).attr("value")),"dziennik");

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
            <form method="post" action="dziennik.php"><i class="fa fa-male"></i> <b>LISTA PRACOWNIKÓW</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="button" id="but_div_filtr" class="btn btn-dark btn-sm text-uppercase float-right dontprint"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-male"></i> Dodaj pracownika</button>
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
                                  <th scope="col">telefon</th>
                                  <th scope="col">Statystyka 2019</th>
                                  <th scope="col">Statystyka 2020</th>
                                  <th scope="col">Typ zgłoszenia</th>

                                  <th colspan="2" scope="col" class="text-center dontprint"></th>
                                </tr>
                                </thead>
                              <tbody>
                                ';
                if ($_POST) {
                $zlecono = (htmlspecialchars(trim($_POST['zlecono'])));
                $status = (htmlspecialchars(trim($_POST['status'])));
                $typ = (htmlspecialchars(trim($_POST['typ'])));
                $adres_ulica = (htmlspecialchars(trim($_POST['adres_ulica'])));
                $adres_nrbud = (htmlspecialchars(trim($_POST['adres_nrbud'])));
                $adres_nrlok = (htmlspecialchars(trim($_POST['adres_nrlok'])));
                $data_od = (htmlspecialchars(trim($_POST['data_od'])));
                $data_do = (htmlspecialchars(trim($_POST['data_do'])));

echo
'<script>

var objsel = {
  "zlecono": "'.$zlecono.'",
  "status": "'.$status.'",
  "typ": "'.$typ.'",
  "adres_ulica": "'.$adres_ulica.'"
};
var objinp = {
  "adres_nrbud": "'.$adres_nrbud.'",
  "adres_nrlok": "'.$adres_nrlok.'",
  "data_od": "'.$data_od.'",
  "data_do": "'.$data_do.'"
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

jQuery("#div_filtr").toggle("fast");
jQuery("#przycisk_filtr").toggle("fast");
jQuery("#przycisk_filtr_wyczysc").toggle("fast");


</script>';


if($zlecono){
  $zlecono_i = ' AND zlecono = "'.pojed_zapyt('SELECT imieinazwisko FROM pracownicy WHERE `id` ='.$zlecono).'"';
}
if($typ){
  $typ_i = ' AND typ = "'.pojed_zapyt('SELECT typ FROM typy WHERE `id` ='.$typ).'"';
}
if($status=='0'){

  $status_i = ' AND data_k = "" ';
}elseif($status=='1'){

  $status_i = ' AND data_k <> "" ';
}
if($adres_ulica){
  $ulica_i = ' AND ulica = "'.pojed_zapyt('SELECT nazwa FROM ulice WHERE `id` ='.$adres_ulica).'"';
}
if($adres_nrbud){
  $adres_nrbud_i = ' AND nr_ulicy = "'.$adres_nrbud.'"';
}
if($adres_nrlok){
  $adres_nrlok_i = ' AND nr_lokalu = "'.$adres_nrlok.'"';
}
if($data_od <> ''){
$data_od_i = ' AND data_p BETWEEN "'.$data_od.'" ';
  if($data_do <> ''){
  $data_do_i = ' AND "'.$data_do.'" ';
  }  else {
    $data_do_i = ' AND "'.date('Y-m-d').'" ';
  }
}
    echo tabeladb2('15','SELECT * FROM dziennik WHERE id IS NOT NULL'.$zlecono_i.''.$typ_i.''.$ulica_i.''.$adres_nrbud_i.''.$adres_nrlok_i.''.$status_i.''.$data_od_i.''.$data_do_i.' ORDER BY `data_p` ASC', '<tr>', '</tr>',
    '<td>', '0', '</td>',
    '<td>', '1', '</td>',
    '<td>', '2', '</td>',
    '<td>', '3', '</td>',
    '<td>', '4', '</td>',
    '<td>', '5', '',
    ' ', '6', '',
    '/', '7', '</td>',
    '<td>', '8', '</td>',
    '<td>', '9', '</td>',
    '', '', '',
    '', '', '',
    '<td class="text-center dontprint"><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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

      echo tabeladb2('15','SELECT * FROM dziennik ORDER BY `id` DESC LIMIT 20', '<tr>', '</tr>',
      '<td>', '0', '</td>',
      '<td>', '1', '</td>',
      '<td>', '2', '</td>',
      '<td>', '3', '</td>',
      '<td>', '4', '</td>',
      '<td>', '5', '',
      ' ', '6', '',
      '/', '7', '</td>',
      '<td>', '8', '</td>',
      '', '', '',
      '', '', '',
      '', '', '',
      '<td class="text-center dontprint"><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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


                }


/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
