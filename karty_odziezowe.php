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
deleteRecord(($(this).attr("value")),"karty_odziezowe");

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
            <form method="post" action="karty_odziezowe.php"><i class="fa fa-user-secret" aria-hidden="true"></i> <b>KARTY ODZIEŻOWE</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
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




for ($x = 0; $x <= 0; $x++) {

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
                                <th scope="col">Pracownik</th>
                                  <th scope="col">Nazwa</th>
                                  <th scope="col">Rozmiar</th>
                                  <th scope="col">Ilość</th>
                                  <th scope="col">Wartość</th>
                                  <th scope="col">Nr dowodu wydania</th>
                                  <th scope="col">Data pobrania</th>
                                  <th scope="col">Okres używalności</th>
                                  <th scope="col">Data Następnego pobrania</th>
                                  <th scope="col">Uwagi</th>

                                  <th colspan="2" scope="col" class="text-center dontprint"><a href="karty_odziezowe_edytuj.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj<br/>rozliczenie</a>
                                  </th>
                                </tr>
                                </thead>
                              <tbody>
                                ';
                                if ($_POST) {
                                  $pracownik = (htmlspecialchars(trim($_POST['pracownik'])));


                  echo
                  '<script>

                  var objsel = {
                    "pracownik": "'.$pracownik.'"
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



                      echo tabeladb2('15','SELECT * FROM karty_odziezowe WHERE id IS NOT NULL'.$pracownik_i.' ORDER BY `id` ASC', '<tr class="text-center">', '</tr>',
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
                      '<td></td>', '', '',
                      '<td>', '9', '</td>',
                      '<td class="text-center dontprint"><a href="karty_odziezowe_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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

      echo tabeladb2('15','SELECT * FROM karty_odziezowe ORDER BY `id` ASC', '<tr class="text-center">', '</tr>',
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
      '<td></td>', '', '',
      '<td>', '9', '</td>',
      '<td class="text-center dontprint"><a href="karty_odziezowe_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>',
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
  echo '<script src="js/date-pl-PL.js" type="text/javascript"></script>';
  echo'
<script>
$(window).on("load", function() {

  $("table:first tr").each(function(){
    var id_do_spr_dir = $(this).find("button:last").attr("id");
    var td_z_data = $(this).find("td:eq(7)");
    var td_z_okresem = $(this).find("td:eq(8)");
    var td_do_dodania = $(this).find("td:eq(9)");

if(td_z_okresem.html() == "9m"){
var mi = 9;
} else if(td_z_okresem.html() == "12m"){
var mi = 12;
}else if(td_z_okresem.html() == "18m"){
var mi = 18;
}else if(td_z_okresem.html() == "24m"){
  var mi = 24;
}else if(td_z_okresem.html() == "36m"){
  var mi = 36;
}else if(td_z_okresem.html() == "48m"){
  var mi = 48;
}else if(td_z_okresem.html() == "96m"){
  var mi = 96;
}else if(td_z_okresem.html() == "3 o.z."){
  var mi = 36;
}else if(td_z_okresem.html() == "6 o.z."){
  var mi = 72;
}else if(td_z_okresem.html() == "d.z."){

}
if($.isNumeric(mi))
      {
        var data_nast = new Date(td_z_data.html()).add(mi).month();
        czywyszlo = Date.today().compareTo(data_nast);
        if(czywyszlo>0){
          td_do_dodania.addClass( "bg-danger text-white font-weight-bold" );
        }else {
          td_do_dodania.addClass( "text-success font-weight-bold" );
        }
td_do_dodania.html(data_nast.toString("yyyy-MM-dd"));
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
