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
            <form method="post" action=""><i class="fa fa-cog" aria-hidden="true"></i> <b>USTAWIENIA OGÓlNE </b>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 mx-auto">

            <div class="col-8 border rounded mx-auto">
            <table class="table table-sm table-striped table-hover">
            <thead>
            <tr class="">
                <th scope="col" class="text-center">Opcja</th>
                <th scope="col" class="text-center w-50">Wartość</th>

              </tr>
              </thead>
            <tbody>
                <tr>
                    <td class="text-right">Symbol jednostki organizacyjnej</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="symbol_jednostki_z" name="symbol_jednostki_z" type="text" value="'.pojed_zapyt('SELECT symbol_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Nazwa jednostki organizacyjnej</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="nazwa_jednostki_z" name="nazwa_jednostki_z" type="text" value="'.pojed_zapyt('SELECT nazwa_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Adres biura jednostki organizacyjnej - ulica</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="adres_biura_ulica_z" name="adres_biura_ulica_z" type="text" value="'.pojed_zapyt('SELECT adres_biura_ulica FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Adres biura jednostki organizacyjnej - kod pocztowy</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="adres_biura_kod_z" name="adres_biura_kod_z" type="text" value="'.pojed_zapyt('SELECT adres_biura_kod FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Adres biura jednostki organizacyjnej - miasto</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="adres_biura_miasto_z" name="adres_biura_miasto_z" type="text" value="'.pojed_zapyt('SELECT adres_biura_miasto FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Numer telefonu biura jednostki organizacyjnej</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="biuro_kontakt_z" name="biuro_kontakt_z" type="text" value="'.pojed_zapyt('SELECT biuro_kontakt FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">E-maile biura jednostki organizacyjnej</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="biuro_email_z" name="biuro_email_z" type="text" value="'.pojed_zapyt('SELECT biuro_email FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Strona WWW biura jednostki organizacyjnej</td>
                    <td class="text-left"><input class="form-control form-control-sm" id="biuro_www_z" name="biuro_www_z" type="text" value="'.pojed_zapyt('SELECT biuro_www FROM ustawienia_ogolne WHERE `id` = 1').'" placeholder=""></td>
                </tr>
                <tr>
                    <td class="text-right">Stopka mail</td>
                    <td class="text-left">
                    <textarea class="form-control form-control-sm mb-3" id="stopka_mail_z" name="stopka_mail_z" rows="12">'.pojed_zapyt('SELECT stopka_mail FROM ustawienia_ogolne WHERE `id` = 1').'</textarea>
                    </td>
                </tr>
            </tbody>
            </table>
            </div>









            </div>
            <div class="row mb-4">
                <div class="col-sm mb-3">
                <button type="button" id="zapis_button" class="btn btn-dark btn-lg text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Zapisz</button>
                </div>
            </div>
        </div>
</form>
</main>';

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
        "nazwa_jednostki" : $("#nazwa_jednostki_z").val(),
        "adres_biura_ulica" : $("#adres_biura_ulica_z").val(),
        "adres_biura_kod" : $("#adres_biura_kod_z").val(),
        "adres_biura_miasto" : $("#adres_biura_miasto_z").val(),
        "biuro_kontakt" : $("#biuro_kontakt_z").val(),
        "biuro_email" : $("#biuro_email_z").val(),
        "biuro_www" : $("#biuro_www_z").val(),
        "stopka_mail" : $("#stopka_mail_z").val(),
        "symbol_jednostki" : $("#symbol_jednostki_z").val()

          };

        tabela = "ustawienia_ogolne";

            updateRecord(1, nowe, tabela);




    });
});
</script>
';

require 'includes/footer.php';
