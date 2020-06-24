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
            <div class="row mb-4 ">
            <div class="col-2">
            <a href="odczyty_licznikow.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="odczyty_licznikow_edytuj.php"><i class="fa fa-tint" aria-hidden="true"></i> <b>ODCZYTY LICZNIKÓW - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded justify-content-md-center">
            <div class="col-sm-2 bg-light border">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data odczytu</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = "" placeholder="">
            </div>
            <div class="col-sm" id="div_uwagi_z">
            <label for="lokalizacja_z" class="badge badge-pill badge-secondary text-uppercase">Lokalizacja - numer licznika</label>
            <br/><select name="lokalizacja_z" id="lokalizacja_z" size="11" class="form-control form-control-sm"><option></option>'.tabeladb2('6','SELECT * FROM liczniki INNER JOIN nieruchomosci_lokalowe ON nieruchomosci_lokalowe.id = liczniki.id_pom LEFT JOIN liczniki_odczyty ON liczniki.nr_licznika = liczniki_odczyty.nr_licznika WHERE liczniki.data_likwidacji = "0000-00-00" GROUP BY liczniki.nr_licznika ORDER BY liczniki.id', '', '', '<option value=', '0', ">", "", "7", "", " ", "8", ";", " typ: ", "2", ";", " numer: ", "3", "", "", "", "", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>

            </div>


            <div class="col-sm-4 bg-light border">



            <label for="stan_z" class="badge badge-pill badge-secondary text-uppercase">Stan</label>
            <input name="stan_z" id="stan_z" class="form-control form-control-sm mb-3" type="number" step="0.001" placeholder="">
            <label for="zuzyl_z" class="badge badge-pill badge-secondary text-uppercase">Zużył</label>
            <input name="zuzyl_z" id="zuzyl_z" class="form-control form-control-sm mb-3" type="text" placeholder="">

            </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm mb-3">

                </div>
                <div class="col-sm-2 mb-3">

                </div>
                <div class="col-sm-2 mb-3">
                    <button type="button" id="zapis_button" class="btn btn-dark btn-lg text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Zapisz</button>
                </div>
            </div>

        </div>
</form>
</main>';
if ($_GET) {

    if($_GET['id']){
        $id_get = (htmlspecialchars(trim($_GET['id'])));

echo '<script>';
echo 'var objinp = {';
echo tabeladb2('12','SELECT * FROM liczniki INNER JOIN liczniki_odczyty ON liczniki.nr_licznika = liczniki_odczyty.nr_licznika INNER JOIN nieruchomosci_lokalowe ON nieruchomosci_lokalowe.id = liczniki.id_pom WHERE liczniki_odczyty.id = '.$id_get.' ORDER BY liczniki.id', '', '',
'"id_z": "', '5', '",',
'"data_z": "', '6', '",',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'"stan_z": "', '7', '",',
'"zuzyl_z": "', '8', '" };',
'
var objsel = {
', '', '',
'"lokalizacja_z": "', '0', '"',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', ''

);

echo '};';
echo '



$.each( objinp, function( select, value ) {
    if(value == ""){  }
    else {
    $("#"+select).val(value);
    $("#input_z_id").show();
    $("#id_z_label").html($("#id_z").val());
    $("#pliki_zapis").removeClass( "d-none" );
};
});
$.each( objsel, function( select, value ) {
    if(value == ""){  }
    else {

        $("#" + select + " option").filter(function() {
            return $(this).val() == value;
        }).prop("selected", true);
     };
});


</script>

';



    }


}
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
echo '
<script>
jQuery(function(){



    jQuery("#zapis_button").click(function () {
        var numer_licznika_pobrany = $("#lokalizacja_z option:selected").html().split("numer: ");
        var nowe = {
        "data_odczytu" : $("#data_z").val(),
        "stan" : $("#stan_z").val(),
        "zuzyl" : $("#zuzyl_z").val(),
        "nr_licznika" : numer_licznika_pobrany[1]
          };

        tabela = "liczniki_odczyty";
        if( !$("#id_z").val() ) {
            createRecord(nowe, tabela);
        } else
        {
            updateRecord($("#id_z").val(), nowe, tabela);

        }


    });
});

$(document).ready(function() {
$("#lokalizacja_z").select2();
});
</script>
<link href="css/select2.min.css" rel="stylesheet" />
<script src="js/select2.min.js"></script>
';

require 'includes/footer.php';
