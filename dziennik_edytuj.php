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
            <a href="dziennik.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="dziennik_edytuj.php"><i class="fa fa-book"></i> <b>DZIENNIK - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = '.date('Y-m-d').' placeholder="">
            <label for="termin_uzgodniony_z" class="badge badge-pill badge-secondary text-uppercase">Termin uzgodniony</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="termin_uzgodniony_z" name="termin_uzgodniony_z" type="text" value = '.date('Y-m-d').' placeholder="">
            <label for="termin_faktyczny_z" class="badge badge-pill badge-secondary text-uppercase">Termin faktyczny</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="termin_faktyczny_z" name="termin_faktyczny_z" type="text" placeholder="">
            </div>
            <div class="col-sm-4" id="div_tresc_z">
            <label for="tresc_z" class="badge badge-pill badge-secondary text-uppercase">Treść</label>
            <textarea class="form-control" id="tresc_z" name="tresc_z" rows="9">';
            if($_GET['id']){ echo pojed_zapyt("SELECT tresc FROM dziennik WHERE `id` = ".$_GET[id]); }
            echo '</textarea>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="adres_ulica_z" class="badge badge-pill badge-secondary text-uppercase">Ulica</label>
            <select name="adres_ulica_z" id="adres_ulica_z" class="form-control form-control-sm mb-3"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
            <div class="row mb-3">
            <div class="col">
            <input name="adres_nrulicy" id="adres_nrulicy" class="form-control form-control-sm" type="text" placeholder="">
            </div>/<div class="col">
            <input name="adres_nrlok" id="adres_nrlok" class="form-control form-control-sm" type="text" placeholder="">
            </div>
            </div>
            <label for="zglasza_z" class="badge badge-pill badge-secondary text-uppercase">Zgłaszający</label>
            <input name="zglasza_z" id="zglasza_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <label for="kontakt_z" class="badge badge-pill badge-secondary text-uppercase">Kontakt</label>
            <input name="kontakt_z" id="kontakt_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-2">
            <label for="typ_z" class="badge badge-pill badge-secondary text-uppercase">Typ</label>
            <select name="typ_z" id="typ_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            <div class="col-sm-2 border bg-light">
            <label for="zlecono_z" class="badge badge-pill badge-secondary text-uppercase">Zlecono</label>
            <select name="zlecono_z" id="zlecono_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm mb-3">
                    <div id="pliki_zapis" class="border rounded bg-light d-none">
                        <label class="badge badge-pill badge-secondary text-uppercase">Pliki i załączniki</label><br/>
                        <div id="fileuploader">Upload</div>
                    </div>
                </div>
                <div class="col-sm-2 mb-3">
                <a href="generator.php?id='.($_GET['id']).'" role="button" class="btn btn-dark btn-sm text-uppercase float-right m-1"><i class="fa fa-file-text" aria-hidden="true"></i> Generuj pismo</a>
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
echo tabeladb2('12','SELECT * FROM dziennik WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_z": "', '1', '",',
'"termin_uzgodniony_z": "', '2', '",',
'"termin_faktyczny_z": "', '3', '",',
'', '', '',
'"adres_nrulicy": "', '6', '",',
'"adres_nrlok": "', '7', '",',
'"zglasza_z": "', '9', '",',
'"kontakt_z": "', '10', '" };',
'
var objsel = {
"adres_ulica_z": "', '5', '",',
'"typ_z": "', '8', '",',
'"zlecono_z": "', '11', '"',
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

echo '
<script src="uploader/jquery.uploadfile.min.js"></script>
   <script src = "uploader/uploader.js"></script>';

    }

    if($_GET['del']){

    $del_get = (htmlspecialchars(trim($_GET['del'])));
    echo 'usuwanie '.$del_get;
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
        "data_p" : $("#data_z").val(),
        "data_u" : $("#termin_uzgodniony_z").val(),
        "data_k" : $("#termin_faktyczny_z").val(),
        "tresc" : $("#tresc_z").val(),
        "ulica" : $("#adres_ulica_z option:selected").html(),
        "nr_ulicy" : $("#adres_nrulicy").val(),
        "nr_lokalu" : $("#adres_nrlok").val(),
        "typ" : $("#typ_z option:selected").html(),
        "zglasza" : $("#zglasza_z").val(),
        "kontakt" : $("#kontakt_z").val(),
        "zlecono" : $("#zlecono_z option:selected").html()
          };

        tabela = "dziennik";
        if( !$("#id_z").val() ) {
            createRecord(nowe, tabela);
        } else
        {
            updateRecord($("#id_z").val(), nowe, tabela);

        }


    });
});
function sendEmail() {
    if ($("#typ_z option:selected").html()=="unifon"){
        window.open("mailto:"+ $("#kontakt_z").val() + "?subject="+ $("#tresc_z").val() + "&body=Data: "+ $("#data_z").val() +" Zgłaszający: "+ $("#zglasza_z").val() +", Kontakt: "+ $("#kontakt_z").val() +" - Adres: "+ $("#adres_ulica_z option:selected").html()+" "+ $("#adres_nrulicy").val() + "/" + $("#adres_nrlok").val() + " - " + $("#tresc_z").val()+ "");
    }
}
</script>
';

require 'includes/footer.php';
