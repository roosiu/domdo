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
            <form method="post" action="dziennik_edytuj.php"><i class="fa fa-male"></i> <b>KONTROLA CZASU PRACY</b> <span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">

            <label for="pracownik_z" class="badge badge-pill badge-secondary text-uppercase">Imię i nazwisko</label>
            <input name="pracownik_z" id="pracownik_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <label for="miesiac_z" class="badge badge-pill badge-secondary text-uppercase">Miesiąc</label>
            <input class="form-control form-control-sm mb-3" id="miesiac_z" name="miesiac_z" type="text" placeholder="">
            <label for="rok_z" class="badge badge-pill badge-secondary text-uppercase">Rok</label>
            <input class="form-control form-control-sm mb-3" id="rok_z" name="rok_z" type="text" placeholder="">
            </div>

            <div class="col-sm-10 border">
            <label for="dni_z" class="badge badge-pill badge-secondary text-uppercase">Dni</label>
            <textarea class="form-control" id="dni_z" name="dni_z" rows="9"></textarea>
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
echo tabeladb2('12','SELECT * FROM kontrola_czasu_pracy WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"miesiac_z": "', '1', '",',
'"rok_z": "', '2', '",',
'"pracownik_z": "', '3', '",',
'"dni_z": "', '4', '",',
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
        "miesiac" : $("#miesiac_z").val(),
        "rok" : $("#rok_z").val(),
        "pracownik" : $("#pracownik_z").val(),
        "dni" : $("#dni_z").val(),
        "urlop" : $("#urlop_z").val()
          };

        tabela = "kontrola_czasu_pracy";
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
