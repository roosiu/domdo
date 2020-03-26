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
            <a href="faktury.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="faktury_edytuj.php"><i class="fa fa-money" aria-hidden="true"></i> <b>FAKTURY I MATERIAŁY - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data wystawienia</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = '.date('Y-m-d').' placeholder="">
            <label for="numer_faktury_z" class="badge badge-pill badge-secondary text-uppercase">Numer Faktury</label>
            <input name="numer_faktury_z" id="numer_faktury_z" class="form-control form-control-sm" type="text" placeholder="">

            </div>
            <div class="col-sm-4" id="div_uwagi_z">
            <label for="nazwa_z" class="badge badge-pill badge-secondary text-uppercase">Nazwa</label>
            <input name="nazwa_z" id="nazwa_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="uwagi_z" class="badge badge-pill badge-secondary text-uppercase">Uwagi</label>
            <textarea class="form-control form-control-sm mb-3" id="uwagi_z" name="uwagi_z" rows="5"></textarea>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="jm_z" class="badge badge-pill badge-secondary text-uppercase">J.m.</label>
            <input name="jm_z" id="jm_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="wartosc_n_z" class="badge badge-pill badge-secondary text-uppercase">Wartość netto</label>
            <input name="wartosc_n_z" id="wartosc_n_z" class="form-control form-control-sm" type="text" placeholder="">


            <label for="ilosc_z" class="badge badge-pill badge-secondary text-uppercase">Ilość</label>
            <input name="ilosc_z" id="ilosc_z" class="form-control form-control-sm mb-3" type="number" step="0.01" placeholder="1">
            <label for="wartosc_b_z" class="badge badge-pill badge-secondary text-uppercase">Wartość brutto</label>
            <input name="wartosc_b_z" id="wartosc_b_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-2">
            <label for="stawka_vat_z" class="badge badge-pill badge-secondary text-uppercase">Stawka VAT</label>
            <select name="stawka_vat_z" id="stawka_vat_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
           '.tabeladb2('1','SELECT * FROM faktury_stawki_vat ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            <div class="col-sm-2 border bg-light">
            <label for="typ_z" class="badge badge-pill badge-secondary text-uppercase">typ</label>
            <select name="typ_z" id="typ_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM faktury_typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
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
echo tabeladb2('12','SELECT * FROM faktury WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_z": "', '7', '",',
'"nazwa_z": "', '2', '",',
'"numer_faktury_z": "', '1', '",',
'"uwagi_z": "', '10', '",',
'"wartosc_n_z": "', '5', '",',
'"jm_z": "', '3', '",',
'"ilosc_z": "', '4', '",',
'"wartosc_b_z": "', '6', '" };',
'
var objsel = {
', '', '',
'"stawka_vat_z": "', '8', '",',
'"typ_z": "', '9', '"',
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
        "data" : $("#data_z").val(),
        "uwagi" : $("#uwagi_z").val().replace(/(\r\n|\n|\r)/gm," "),
        "wartosc_netto" : $("#wartosc_n_z").val(),
        "jm" : $("#jm_z").val(),
        "stawka_vat" : $("#stawka_vat_z option:selected").html(),
        "ilosc" : $("#ilosc_z").val(),
        "nazwa_poz" : $("#nazwa_z").val(),
        "numer_faktury" : $("#numer_faktury_z").val(),
        "wartosc_brutto" : $("#wartosc_b_z").val(),
        "typ" : $("#typ_z option:selected").html()
          };

        tabela = "faktury";
        if( !$("#id_z").val() ) {
            createRecord(nowe, tabela);
        } else
        {
            updateRecord($("#id_z").val(), nowe, tabela);

        }


    });
});

</script>
';

require 'includes/footer.php';
