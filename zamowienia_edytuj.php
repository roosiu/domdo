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
            <a href="zamowienia.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="zamowienia_edytuj.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <b>ZAMÓWIENIA - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = '.date('Y-m-d').' placeholder="">
            </div>
            <div class="col-sm" id="div_produkty_z">
            <label for="produkty_z" class="badge badge-pill badge-secondary text-uppercase">produkty</label>
            <textarea class="form-control form-control-sm mb-3" id="produkty_z" name="produkty_z" rows="15">'.pojed_zapyt("SELECT produkty FROM zamowienia WHERE `id` = ".$_GET[id]).'</textarea>
            </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm mb-3">

                </div>
                <div class="col-sm-2 mb-3">
                <button type="button" class="btn btn-dark btn-sm text-uppercase float-right m-1" onclick=sendEmail()><i class="fa fa-paper-plane" aria-hidden="true"></i> Wyślij mail</button>

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
echo tabeladb2('12','SELECT * FROM zamowienia WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_z": "', '1', '",',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '};',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', ''

);


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
function sendEmail() {
    window.open("mailto: '.pojed_zapyt('SELECT mail FROM ustawienia_adresy_mail WHERE `nazwa` = "zgl_zam"').'  ?subject= Zamówienia '.pojed_zapyt('SELECT symbol_jednostki FROM ustawienia_ogolne WHERE `id` = "1"').' '.pojed_zapyt('SELECT adres_biura_miasto FROM ustawienia_ogolne WHERE `id` = "1"').' z dnia "+ $.datepicker.formatDate("yy-mm-dd", new Date()) + "&body=Data: "+ $.datepicker.formatDate("yy-mm-dd", new Date()) +"%0D%0AProdukty:%0D%0A□"+ $("#produkty_z").val().replace(/\r\n|\r|\n/g,"%0D%0A□") +" '.pojed_zapyt('SELECT stopka_mail FROM ustawienia_ogolne WHERE `id` = 1').'");

}


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
        "produkty" : $("#produkty_z").val()
          };

        tabela = "zamowienia";
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
