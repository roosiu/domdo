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
            <div class="row mb-4">
            <div class="col-2">
            <button type="button" id="but_div_filtr" class="btn btn-dark btn-sm text-uppercase float-left dontprint"><i class="fa fa-eye-slash" aria-hidden="true"></i> Pokaż/Ukryj filtry</button>
            </div>
            <div class="col text-center">
            <form method="post" action="dziennik.php"><i class="fa fa-book"></i> <b>DZIENNIK</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col-2">
            <button type="submit" id="przycisk_filtr" class="btn btn-dark btn-sm text-uppercase float-right dontprint" style="display: none"><i class="fa fa-filter" aria-hidden="true"></i> Filtruj</button>

            </div>
            </div>
<script>
jQuery(function(){
  jQuery("#but_div_filtr").click(function () {
    jQuery("#div_filtr").toggle("slow");
    jQuery("#przycisk_filtr").toggle("slow");
  });
});
</script>

                <div id="div_filtr" class="row mb-3 dontprint" style="display: none">';
                $filtr_0_rozmiar = '-2';
                $filtr_0_text = 'ZLECONO';
                $filtr_0 = '<select name="zlecono" id="zlecono" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_1_rozmiar = '-2';
                $filtr_1_text = 'STATUS';
                $filtr_1 = '<select name="status" id="status" class="form-control form-control-sm">
                <option></option>
                <option value=1>wykonane</option>
                <option value=0>niewykonane</option>
                </select>';
                $filtr_2_rozmiar = '-2';
                $filtr_2_text = 'TYP';
                $filtr_2 = '<select name ="typ" id="typ" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_3_rozmiar = '-3';
                $filtr_3_text = 'ADRES';
                $filtr_3 = '
                <div class="row">
                <div class="col-sm-8 pr-1">
                <select name="adres_ulica" id="adres_ulica" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
                </div>
                <div class="col-sm px-0"><input name="adres_nrbud" id="adres_nrbud" class="form-control form-control-sm" type="text" placeholder="">
                </div>/
                <div class="col-sm pl-0">
                <input name="adres_nrlok" id="adres_nrlok" class="form-control form-control-sm" type="text" placeholder="">
                </div></div>';
                $filtr_4_rozmiar = '';
                $filtr_4_text = 'DATA OD';
                $filtr_4 = '
                <input type="text" name="data_od" class="form-control form-control-sm" id="datepicker-10" value = '.(date('Y-m-d', strtotime(" -1 year"))).'>';
                $filtr_5_rozmiar = '';
                $filtr_5_text = 'DATA DO';
                $filtr_5 = '
                <input type = "text" name="data_do" class="form-control form-control-sm" id = "datepicker" value = '.date('Y-m-d').'>';
                for ($x = 0; $x <= 5; $x++) {

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

                        echo '<table class="table table-sm table-striped">
                              <thead>
                              <tr class="">
                                  <th scope="col">ID</th>
                                  <th scope="col">data</th>
                                  <th scope="col">termin uzgodniony</th>
                                  <th scope="col">termin faktyczny</th>
                                  <th scope="col">Treść</th>
                                  <th scope="col">Adres</th>
                                  <th scope="col">Typ zgłoszenia</th>
                                  <th scope="col">Zgłaszający</th>
                                  <th scope="col">Kontakt</th>
                                  <th scope="col">Zlecono</th>
                                  <th colspan="2" scope="col" class="text-center dontprint"><button type="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj zdarzenie</button></th>
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
    echo tabeladb2('12','SELECT * FROM dziennik WHERE id IS NOT NULL'.$zlecono_i.''.$typ_i.''.$ulica_i.''.$adres_nrbud_i.''.$adres_nrlok_i.''.$status_i.''.$data_od_i.''.$data_do_i.' ORDER BY `data_p` ASC', '<tr>', '</tr>',
    '<td>', '0', '&nbsp;<span class="badge badge-dark dontprint clickable pokazukryj"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></td>',
    '<td>', '1', '</td>',
    '<td>', '2', '</td>',
    '<td>', '3', '</td>',
    '<td>', '4', '</td>',
    '<td>', '5', '',
    ' ', '6', '',
    '/', '7', '</td>',
    '<td>', '8', '</td>',
    '<td>', '9', '</td>',
    '<td>', '10', '</td>',
    '<td>', '11', '</td>',
    '<td class="text-center dontprint">', '', '<button type="button" class="btn btn-dark btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</button></td>
    <td class="text-center dontprint"><button type="button" class="btn btn-dark btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>');

   echo '
   </tbody>
            </table>



</div>


</main>';

} else

{

      echo tabeladb2('12','SELECT * FROM dziennik ORDER BY `id` DESC LIMIT 20', '<tr>', '</tr>',
      '<td>', '0', '&nbsp;<span class="badge badge-dark dontprint clickable pokazukryj"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></td>',
      '<td>', '1', '</td>',
      '<td>', '2', '</td>',
      '<td>', '3', '</td>',
      '<td>', '4', '</td>',
      '<td>', '5', '',
      ' ', '6', '',
      '/', '7', '</td>',
      '<td>', '8', '</td>',
      '<td>', '9', '</td>',
      '<td>', '10', '</td>',
      '<td>', '11', '</td>',
      '<td class="text-center dontprint">', '', '<button type="button" class="btn btn-dark btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</button></td>
      <td class="text-center dontprint"><button type="button" class="btn btn-dark btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>');

     echo '
     </tbody>
              </table>



  </div>


  </main>';


                }


/// koniec części main
/// dodawanie przycisku niedrukowania wybranych zdarzeń z tabeli
echo '
<script>
$(".pokazukryj").click(function() {
  if (!$(this).parent().parent().hasClass("dontprint"))
  {
   $(this).parent().parent().addClass("dontprint text-light bg-secondary");
  } else {
    $(this).parent().parent().removeClass("dontprint text-light bg-secondary");

  }
});

</script>

';
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
