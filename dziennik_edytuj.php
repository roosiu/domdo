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
            <form method="post" action="dziennik_edytuj.php"><i class="fa fa-book"></i> <b>DZIENNIK - EDYTUJ</b>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4">
            <div class="col-sm-2 bg-light">
            <label for="data_z">Data</label>
            <input class="form-control form-control-sm mb-3" id="data_z" type="text" placeholder="">
            <label for="termin_uzgodniony_z">Termin uzgodniony</label>
            <input class="form-control form-control-sm mb-3" id="termin_uzgodniony_z" type="text" placeholder="">
            <label for="termin_faktyczny_z">Termin faktyczny</label>
            <input class="form-control form-control-sm mb-3" id="termin_faktyczny_z" type="text" placeholder="">
            </div>
            <div class="col-sm-4">
            <label for="tresc_z">Treść</label>
            <textarea class="form-control" id="tresc_z" rows="7"></textarea>
            </div>
            <div class="col-sm-2 bg-light">
            <label for="adres_ulica_z">Ulica</label>
            <select name="adres_ulica" id="adres_ulica_z" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>

            </div>
            <div class="col-sm-2">dsa</div>
            <div class="col-sm-2">dsa</div>
            </div>
    </div>
</form>
</main>';

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
