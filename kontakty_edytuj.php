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
            <a href="kontakty.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="kontakty_edytuj.php"><i class="fa fa-phone" aria-hidden="true"></i> <b>KONTAKTY </b> <span id="input_z_id" style="display: none"> | kontakt o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-5 bg-light border">
            <label for="nazwa_z" class="badge badge-pill badge-secondary text-uppercase">Nazwa</label>
            <input class="form-control form-control-sm mb-3" id="nazwa_z" name="nazwa_z" type="text" placeholder="">
            <label for="adres_z" class="badge badge-pill badge-secondary text-uppercase">Adres</label>
            <textarea class="form-control" id="adres_z" name="adres_z" rows="9"></textarea>
            </div>
            <div class="col-sm-4" id="div_tresc_z">
            <label for="kontakt_z" class="badge badge-pill badge-secondary text-uppercase">Kontakt</label>
            <input name="kontakt_z" id="kontakt_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <label for="mail_z" class="badge badge-pill badge-secondary text-uppercase">Adres e-mail</label>
            <input class="form-control form-control-sm mb-3" id="mail_z" name="mail_z" type="text" placeholder="">
            <label for="strona_z" class="badge badge-pill badge-secondary text-uppercase">Strona WWW</label>
            <input name="strona_z" id="strona_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-3 bg-light border">
            <label for="informacje_z" class="badge badge-pill badge-secondary text-uppercase">Informacje dodatkowe</label>
            <textarea class="form-control" id="informacje_z" name="informacje_z" rows="9"></textarea>


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
echo tabeladb2('12','SELECT * FROM kontakty WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"nazwa_z": "', '1', '",',
'"kontakt_z": "', '3', '",',
'"adres_z": "', '2', '",',
'"informacje_z": "', '6', '",',
'"mail_z": "', '4', '",',
'"strona_z": "', '5', '" };',
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
        "nazwa" : $("#nazwa_z").val(),
        "kontakt" : $("#kontakt_z").val(),
        "adres" : $("#adres_z").val(),
        "mail" : $("#mail_z").val(),
        "strona" : $("#strona_z").val(),
        "informacje" : $("#informacje_z").val()
          };

        tabela = "kontakty";
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
