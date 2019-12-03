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

                <h5 class="card-header bg-white mb-3 text-center">
                <button type="button" id="but_div_filtr" class="btn btn-dark btn-sm text-uppercase float-left"><i class="fa fa-eye-slash" aria-hidden="true"></i> Pokaż/Ukryj filtry</button>
                <form method="post" action="dziennik.php"><i class="fa fa-book"></i> DZIENNIK
                <button type="submit" id="przycisk_filtr" class="btn btn-dark btn-sm text-uppercase float-right" style="display: none"><i class="fa fa-filter" aria-hidden="true"></i> Filtruj</button>
                </h5>
<script>
jQuery(function(){
  jQuery("#but_div_filtr").click(function () {
    jQuery("#div_filtr").toggle("slow");
    jQuery("#przycisk_filtr").toggle("slow");
  });
});
</script>

                <div id="div_filtr" class="row mb-3" style="display: none">';
                $filtr_0_rozmiar = '-2';
                $filtr_0_text = 'ZLECONO';
                $filtr_0 = '<select name="zlecono" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_1_rozmiar = '-2';
                $filtr_1_text = 'STATUS';
                $filtr_1 = '<select name="status" class="form-control form-control-sm">
                <option></option>
                <option value=1>wykonane</option>
                <option value=0>niewykonane</option>
                </select>';
                $filtr_2_rozmiar = '-2';
                $filtr_2_text = 'TYP';
                $filtr_2 = '<select name ="typ" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_3_rozmiar = '-3';
                $filtr_3_text = 'ADRES';
                $filtr_3 = '
                <div class="row">
                <div class="col-sm-8 pr-1">
                <select name="adres_ulica" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
                </div>
                <div class="col-sm px-0"><input name="adres_nrbud" class="form-control form-control-sm" type="text" placeholder="">
                </div>/
                <div class="col-sm pl-0">
                <input name="adres_nrlok" class="form-control form-control-sm" type="text" placeholder="">
                </div></div>';
                $filtr_4_rozmiar = '';
                $filtr_4_text = 'DATA OD';
                $filtr_4 = '
                <input type="text" name="data_od" class="form-control form-control-sm" id="datepicker-10">';
                $filtr_5_rozmiar = '';
                $filtr_5_text = 'DATA DO';
                $filtr_5 = '
                <input type = "text" name="data_do" class="form-control form-control-sm" id = "datepicker">';
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
                if ($_POST) {
                $zlecono = (htmlspecialchars(trim($_POST['zlecono'])));
                $status = (htmlspecialchars(trim($_POST['status'])));
                $typ = (htmlspecialchars(trim($_POST['typ'])));
                $adres_ulica = (htmlspecialchars(trim($_POST['adres_ulica'])));
                $adres_nrbud = (htmlspecialchars(trim($_POST['adres_nrbud'])));
                $adres_nrlok = (htmlspecialchars(trim($_POST['adres_nrlok'])));
                $data_od = (htmlspecialchars(trim($_POST['data_od'])));
                $data_do = (htmlspecialchars(trim($_POST['data_do'])));
echo $zlecono;
echo $status;
echo $typ;
echo $adres_ulica;
echo $adres_nrbud;
echo $adres_nrlok;
echo $data_od;
echo $data_do;
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
<<<<<<< HEAD
  "adres_nrlok": "'.$adres_nrlok.'"
=======
  "adres_nrlok": "'.$adres_nrlok.'",
  "data_od": "'.$data_od.'",
  "data_do": "'.$data_do.'"
>>>>>>> zmianydziennik
};
$.each( objsel, function( select, value ) {
  $(function() {
    $("[name="+select+"] option").filter(function() {
        return ($(this).val() == value);
    }).prop("selected", true);
  })
});

<<<<<<< HEAD
$.each( objinp, function( select, value ) {
  $("input[name="+select+"]").val(value);

});
$("#datepicker-10").datepicker("setDate", "-7");


=======
>>>>>>> zmianydziennik
jQuery("#div_filtr").toggle("fast");
jQuery("#przycisk_filtr").toggle("fast");

</script>';
                          }

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
                  <th colspan="2" scope="col" class="text-center"><button type="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj zdarzenie</button></th>
                </tr>
                </thead>
              <tbody>
                ';


    echo tabeladb2('12','SELECT * FROM dziennik ORDER BY `id` ASC', '<tr>', '</tr>',
    '<td>', '0', '&nbsp;<span class="badge badge-dark"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></td>',
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
    '<td class="text-center">', '', '<button type="button" class="btn btn-dark btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</button></td><td class="text-center"><button type="button" class="btn btn-dark btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>');

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
