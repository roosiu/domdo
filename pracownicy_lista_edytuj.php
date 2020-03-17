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
            <a href="pracownicy_lista.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="pracownicy_lista_edytuj.php"><i class="fa fa-male"></i> <b>LISTA PRACOWNIKÓW</b> <span id="input_z_id" style="display: none"> | pracownik o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="imieinazwisko_z" class="badge badge-pill badge-secondary text-uppercase">Imię i Nazwisko</label>
            <input class="form-control form-control-sm mb-3" id="imieinazwisko_z" name="imieinazwisko_z" type="text" placeholder="">
            </div>
            <div class="col-sm-3" id="div_tresc_z">
            <label for="stanowisko_z" class="badge badge-pill badge-secondary text-uppercase">Stanowisko</label>
            <input class="form-control form-control-sm mb-3" id="stanowisko_z" name="stanowisko_z" type="text" placeholder="">
            </div>
            <div class="col-sm-3 bg-light border">


            <label for="kontakt_z" class="badge badge-pill badge-secondary text-uppercase">Kontakt</label>
            <input name="kontakt_z" id="kontakt_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-3 border bg-light">
            <label for="adres_z" class="badge badge-pill badge-secondary text-uppercase">Adres</label>
            <textarea class="form-control" id="adres_z" name="adres_z" rows="9"></textarea>
            </div>
            <div class="col-sm-1">

            <label for="urlop_z" class="badge badge-pill badge-secondary text-uppercase">Godzin UW na rok</label>
            <input name="urlop_z" id="urlop_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
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
if ($_GET) {

    if($_GET['id']){
        $id_get = (htmlspecialchars(trim($_GET['id'])));

echo '<script>';
echo 'var objinp = {';
echo tabeladb2('12','SELECT * FROM pracownicy WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"imieinazwisko_z": "', '1', '",',
'"kontakt_z": "', '2', '",',
'"adres_z": "', '3', '",',
'"aktywny_z": "', '4', '",',
'"stanowisko_z": "', '5', '",',
'"urlop_z": "', '6', '" };',
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
        "imieinazwisko" : $("#imieinazwisko_z").val(),
        "kontakt" : $("#kontakt_z").val(),
        "adres" : $("#adres_z").val(),
        "stanowisko" : $("#stanowisko_z").val(),
        "urlop" : $("#urlop_z").val()
          };

        tabela = "pracownicy";
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
