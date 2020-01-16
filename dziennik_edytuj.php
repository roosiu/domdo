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
            </div>
            <div class="col text-center">
            <form method="post" action="dziennik_edytuj.php"><i class="fa fa-book"></i> <b>DZIENNIK - EDYTUJ</b> | wpis o id: <input disabled size="7" id="id_z"></input>
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
            <textarea class="form-control" id="tresc_z" name="tresc_z" rows="9"></textarea>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="adres_ulica_z" class="badge badge-pill badge-secondary text-uppercase">Ulica</label>
            <select name="adres_ulica_z" id="adres_ulica_z" class="form-control form-control-sm mb-3"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
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
            '.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            <div class="col-sm-2 border bg-light">
            <label for="zlecono_z" class="badge badge-pill badge-secondary text-uppercase">Zlecono</label>
            <select name="zlecono_z" id="zlecono_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            </div>

            <div class="row mb-4">
            <div class="col-sm border rounded bg-light mb-3">
            <label class="badge badge-pill badge-secondary text-uppercase">Pliki i załączniki</label>
            </div>
            <div class="col-sm-2 mb-3">
            <button type="button" class="btn btn-dark btn-sm text-uppercase float-right"><i class="fa fa-file-text" aria-hidden="true"></i> Generuj pismo</button>
            </div>
            <div class="col-sm-2 mb-3">

            <button type="button" class="btn btn-dark btn-sm text-uppercase float-right"><i class="fa fa-plus" aria-hidden="true"></i> Zapisz</button>
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
'"tresc_z": "', '4', '",',
'"adres_nrulicy": "', '6', '",',
'"adres_nrlok": "', '7', '",',
'"zglasza_z": "', '9', '",',
'"kontakt_z": "', '10', '" };',
'var objsel = {
    "adres_ulica_z": "', '9', '",',
'"typ_z": "', '10', '",',
'"zlecono_z": "', '11', '",',
'"zlecono_z": "', '11', '"'
);

echo '};';
echo '



$.each( objinp, function( select, value ) {
    if(value == ""){  }
    else {
    $("#"+select).val(value);
    };
});
</script>

';




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

require 'includes/footer.php';
