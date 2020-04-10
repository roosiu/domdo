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
            <form method="post" action=""><i class="fa fa-cog" aria-hidden="true"></i> <b>USTAWIENIA - ADRESY EMAIL </b>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 mx-auto">

            <div class="col-8 border rounded mx-auto">
            <table class="table table-sm table-striped table-hover">
            <thead>
            <tr class="">
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center">Opcja</th>
                <th scope="col" class="text-center w-50">Wartość</th>

              </tr>
              </thead>
            <tbody>
                ';

                echo tabeladb2('15','SELECT * FROM ustawienia_adresy_mail ORDER BY `id` ASC', '<tr>', '</tr>',
                '<td class="text-center">', '0', '</td>',
                '<td class="text-right">', '2', '</td>',
                ' <td class="text-left"><input class="form-control form-control-sm" id="', '1', '" type="text" ',
                ' value="', '3', '" placeholder=""></td>',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', '',
                 '', '', '',
                 '', '', '',
                 '', '', ''
                );

           echo '</tbody>
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
        "symbol_jednostki" : $("#symbol_jednostki_z").val()

          };

        tabela = "ustawienia_ogolne";

            updateRecord(1, nowe, tabela);




    });
});
</script>
';

require 'includes/footer.php';
