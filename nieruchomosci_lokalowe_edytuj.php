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
            <a href="nieruchomosci_lokalowe.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="nieruchomosci_lokalowe_edytuj.php"><i class="fa fa-fort-awesome" aria-hidden="true"></i> <b>NIERUCHOMOŚCI LOKALOWE - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="indeks_z" class="badge badge-pill badge-secondary text-uppercase">indeks</label>
            <input class="form-control form-control-sm mb-3" id="indeks_z" name="indeks_z" type="text" value = "" placeholder="">
            <label for="powierzchnia_z" class="badge badge-pill badge-secondary text-uppercase">powierzchnia</label>
            <input name="powierzchnia_z" id="powierzchnia_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="grupa_z" class="badge badge-pill badge-secondary text-uppercase">grupa</label>
            <select name="grupa_z" id="grupa_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM nieruchomosci_lokalowe_grupy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
            </div>
            <div class="col-sm-4" id="div_uwagi_z">
            <label for="lokalizacja_z" class="badge badge-pill badge-secondary text-uppercase">lokalizacja</label>
                <div class="row">
                    <div class="col-sm-8">
                        <select name="lokalizacja_z" id="lokalizacja_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
                        <option></option>
                        '.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
                        </select>
                    </div>
                    <div class="col-sm">
                        <input name="lokalizacja_nr" id="lokalizacja_nr" class="form-control form-control-sm" type="text" placeholder="">
                    </div>
                </div>

                <label for="najemca_z" class="badge badge-pill badge-secondary text-uppercase">Najemca</label>
            <input name="najemca_z" id="najemca_z" class="form-control form-control-sm" type="text" placeholder="">


            <label for="opiekun_z" class="badge badge-pill badge-secondary text-uppercase">Opiekun</label>
            <input name="opiekun_z" id="opiekun_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <label for="wlasciciel_z" class="badge badge-pill badge-secondary text-uppercase">Właściciel</label>
            <input name="wlasciciel_z" id="wlasciciel_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-3 bg-light border">

            <label for="rodzaj_dzialalnosci_z" class="badge badge-pill badge-secondary text-uppercase">Rodzaj Działalności</label>
            <input name="rodzaj_dzialalnosci_z" id="rodzaj_dzialalnosci_z" class="form-control form-control-sm" type="text" placeholder="">

            <label for="kontakt_z" class="badge badge-pill badge-secondary text-uppercase">Dane kontaktowe</label>
            <textarea class="form-control form-control-sm mb-3" id="kontakt_z" name="kontakt_z" rows="8"></textarea>
            </div>
            <div class="col-sm-3">

            <label for="info_dod_z" class="badge badge-pill badge-secondary text-uppercase">Dod. Informacje</label>
            <textarea class="form-control form-control-sm mb-3" id="info_dod_z" name="info_dod_z" rows="11"></textarea>
            </div>

            </div>

            <div class="row mb-4">
                <div class="col-sm mb-3">
                    <div id="liczniki" class="border rounded bg-light d-none">
                        <label class="badge badge-pill badge-secondary text-uppercase">Liczniki</label><br/>
                        <table class="table table-sm table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>TYP LICZNIKA</th>
                            <th>NUMER LICZNIKA</th>
                            <th>WYMIENIONO DNIA</th>
                            <th class="text-center">
                            <a href="liczniki_edytuj.php?id_pom='.$_GET['id'].'" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-plus" aria-hidden="true"></i> Dodaj</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        ';
                        if ($_GET) {

                            if($_GET['id']){
                                $id_get = (htmlspecialchars(trim($_GET['id'])));
                        echo tabeladb2('15','SELECT * FROM liczniki WHERE id_pom="'.$id_get.'" ORDER BY `id_pom` ASC', '<tr>', '</tr>',
                        '<td><span class="small">', '0', '</span></td>',
                        '<td>', '2', '</td>',
                        '<td>', '3', '</td>',
                        '<td>', '4', '</td>',
                        '<td class="text-center dontprint text-nowrap"><a href="liczniki_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i>edytuj</a></td>',
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



echo '<script>';
echo 'var objinp = {';
echo tabeladb2('12','SELECT * FROM nieruchomosci_lokalowe WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"indeks_z": "', '1', '",',
'"rodzaj_dzialalnosci_z": "', '6', '",',
'"lokalizacja_nr": "', '3', '",',
'"info_dod_z": "', '11', '",',
'"najemca_z": "', '7', '",',
'"powierzchnia_z": "', '4', '",',
'"kontakt_z": "', '10', '",',
'"opiekun_z": "', '8', '",',
'"wlasciciel_z": "', '9', '" };',
'
var objsel = {
', '', '',
'"lokalizacja_z": "', '2', '",',
'"grupa_z": "', '5', '"',
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
    $("#liczniki").removeClass( "d-none" );
};
});
$.each( objsel, function( select, value ) {
    if(value == ""){  }
    else {
        $("#" + select + " option").filter(function() {
            return $(this).text() == value;
        }).prop("selected", true);
    };
});


</script>

';



    }


}
echo '                        </tbody>
</table>
</div>
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
        "indeks" : $("#indeks_z").val(),
        "info_dod" : $("#info_dod_z").val().replace(/(\r\n|\n|\r)/gm," "),
        "kontakt" : $("#kontakt_z").val().replace(/(\r\n|\n|\r)/gm," "),
        "najemca" : $("#najemca_z").val(),
        "powierzchnia" : $("#powierzchnia_z").val(),
        "opiekun" : $("#opiekun_z").val(),
        "lokalizacja" : $("#lokalizacja_z option:selected").html(),
        "lokalizacja_nr" : $("#lokalizacja_nr").val(),
        "rodzaj_dzialalnosci" : $("#rodzaj_dzialalnosci_z").val(),
        "wlasciciel" : $("#wlasciciel_z").val(),
        "grupa" : $("#grupa_z option:selected").html()
          };

        tabela = "nieruchomosci_lokalowe";
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
