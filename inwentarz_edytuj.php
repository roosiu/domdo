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
            <a href="inwentarz.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="inwentarz_edytuj.php"><i class="fa fa-building" aria-hidden="true"></i> <b>INWENTARZ - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="nr_inw_z" class="badge badge-pill badge-secondary text-uppercase">Nr inw.</label>
            <input name="nr_inw_z" id="nr_inw_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = '.date('Y-m-d').' placeholder="">
            <label for="zlikwidowano_z" class="badge badge-pill badge-secondary text-uppercase">Zlikwidowano</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="zlikwidowano_z" name="zlikwidowano_z" type="text" placeholder="">
            </div>
            <div class="col-sm-4" id="div_uwagi_z">
            <label for="nazwa_z" class="badge badge-pill badge-secondary text-uppercase">Nazwa</label>
            <input name="nazwa_z" id="nazwa_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="grupa_z" class="badge badge-pill badge-secondary text-uppercase">Grupa</label>
            <select name="grupa_z" id="grupa_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM inwentarz_grupy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="lokalizacja_z" class="badge badge-pill badge-secondary text-uppercase">Lokalizacja</label>
            <input name="lokalizacja_z" id="lokalizacja_z" class="form-control form-control-sm" type="text" placeholder="">


            <label for="nr_dowodu_wyd_z" class="badge badge-pill badge-secondary text-uppercase">Nr dowodu wydania</label>
            <input name="nr_dowodu_wyd_z" id="nr_dowodu_wyd_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-2">
            <label for="ilosc_z" class="badge badge-pill badge-secondary text-uppercase">Ilość</label>
            <input name="ilosc_z" id="ilosc_z" class="form-control form-control-sm mb-3" type="number" placeholder="">
            <label for="wartosc_netto_z" class="badge badge-pill badge-secondary text-uppercase">Wartość netto</label>
            <input name="wartosc_netto_z" id="wartosc_netto_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="wartosc_ewid_z" class="badge badge-pill badge-secondary text-uppercase">Wartość ewid.</label>
            <input name="wartosc_ewid_z" id="wartosc_ewid_z" class="form-control form-control-sm" type="text" placeholder="">
            </div>
            <div class="col-sm-2 border bg-light">
            <label for="przypisano_z" class="badge badge-pill badge-secondary text-uppercase">Przypisano</label>
            <input name="przypisano_z" id="przypisano_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="pracownik_z" class="badge badge-pill badge-secondary text-uppercase">Dodaj z listy</label>
            <select name="pracownik_z" id="pracownik_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
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
echo tabeladb2('15','SELECT * FROM inwentarz WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"nr_inw_z": "', '1', '",',
'"data_z": "', '7', '",',
'"zlikwidowano_z": "', '11', '",',
'"nazwa_z": "', '2', '",',
'"uwagi_z": "', '9', '",',
'"wartosc_netto_z": "', '9', '",',
'"wartosc_ewid_z": "', '10', '",',
'"przypisano_z": "', '8', '",',
'"lokalizacja_z": "', '4', '",',
'"ilosc_z": "', '6', '",',
'"nr_dowodu_wyd_z": "', '5', '" };',
'
var objsel = {
', '', '',
'"grupa_z": "', '3', '",',
'"pracownik_z": "', '8', '"',
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

        $("#" + select + " option:contains(" + value + ")").attr("selected", "selected");
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
        var nowe = {
        "nr_inw" : $("#nr_inw_z").val(),
        "data" : $("#data_z").val(),
        "zlikwidowano" : $("#zlikwidowano_z").val(),
        "nazwa" : $("#nazwa_z").val(),
        "grupa" : $("#grupa_z option:selected").html(),
        "lokalizacja" : $("#lokalizacja_z").val(),
        "nr_dow_wyd" : $("#nr_dowodu_wyd_z").val(),
        "ilosc" : $("#ilosc_z").val(),
        "wartosc_netto" : $("#wartosc_netto_z").val(),
        "wartosc_ewid" : $("#wartosc_ewid_z").val(),
        "przypisane_do" : $("#przypisano_z").val()

          };

        tabela = "inwentarz";
        if( !$("#id_z").val() ) {
            createRecord(nowe, tabela);
        } else
        {
            updateRecord($("#id_z").val(), nowe, tabela);

        }


    });
});
$("#pracownik_z").on("change", function() {

    kto_przypis = $(this).find("option:selected").text();
    $("#przypisano_z").val(kto_przypis);

  });
</script>
';

require 'includes/footer.php';
