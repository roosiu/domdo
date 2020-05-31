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
            <a href="adresy_korespondencyjne.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="adresy_korespondencyjne_edytuj.php"><i class="fa fa-phone" aria-hidden="true"></i> <b>ADRESY KORESPODENCYJNE </b> <span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-5 bg-light border">
            <label for="imieinazwisko_z" class="badge badge-pill badge-secondary text-uppercase">Imię i Nazwisko</label>
            <input class="form-control form-control-sm mb-3" id="imieinazwisko_z" name="imieinazwisko_z" type="text" placeholder="">
            <label for="koresp_ul_z" class="badge badge-pill badge-secondary text-uppercase">Ulica</label>
            <textarea class="form-control" id="koresp_ul_z" name="koresp_ul_z" rows="9"></textarea>
            </div>
            <div class="col-sm-4" id="div_tresc_z">
            <label for="kod_z" class="badge badge-pill badge-secondary text-uppercase">kod</label>
            <input name="kod_z" id="kod_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <label for="miasto_z" class="badge badge-pill badge-secondary text-uppercase">Miasto</label>
            <input class="form-control form-control-sm mb-3" id="miasto_z" name="miasto_z" type="text" placeholder="">
            <label for="dotyczy_z" class="badge badge-pill badge-secondary text-uppercase">Dotyczy</label>
            <input name="dotyczy_z" id="dotyczy_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-3 bg-light border">
            <label for="info_dod_z" class="badge badge-pill badge-secondary text-uppercase">Informacje dodatkowe</label>
            <textarea class="form-control" id="info_dod_z" name="info_dod_z" rows="9"></textarea>


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
echo tabeladb2('12','SELECT * FROM adresy_korespondencyjne WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"imieinazwisko_z": "', '1', '",',
'"kod_z": "', '3', '",',
'"koresp_ul_z": "', '2', '",',
'"info_dod_z": "', '6', '",',
'"miasto_z": "', '4', '",',
'"dotyczy_z": "', '5', '" };',
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
        "imieinazwisko" : $("#imieinazwisko_z").val(),
        "koresp_kod" : $("#kod_z").val(),
        "koresp_ul" : $("#koresp_ul_z").val(),
        "koresp_miasto" : $("#miasto_z").val(),
        "dotyczy" : $("#dotyczy_z").val(),
        "info_dod" : $("#info_dod_z").val()
          };

        tabela = "adresy_korespondencyjne";
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
