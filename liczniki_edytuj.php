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
            <a href="liczniki_edytuj.php" id="powrot_button" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="liczniki_edytuj.php"><i class="fa fa-tachometer" aria-hidden="true"></i> <b>LICZNIKI - EDYTUJ</b><span id="input_z_id" style="display: none"> | licznik o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>


            <div class="d-flex justify-content-center">
            <div class="col-sm-4 bg-light border " id="div_uwagi_z">
            <label for="pomieszczenie_z" class="badge badge-pill badge-secondary text-uppercase">Pomieszczenie ID</label>
            <input name="pomieszczenie_z" id="pomieszczenie_z" class="form-control form-control-sm" type="text" disabled placeholder="">
            <label for="pomieszczenie_nazwa_z" class="badge badge-pill badge-secondary text-uppercase">Pomieszczenie</label>
            <input name="pomieszczenie_nazwa_z" id="pomieszczenie_nazwa_z" class="form-control form-control-sm" type="text" disabled placeholder="">
            <label for="typ_licznika_z" class="badge badge-pill badge-secondary text-uppercase">TYP LICZNIKA</label>
            <input name="typ_licznika_z" id="typ_licznika_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="nr_licznika_z" class="badge badge-pill badge-secondary text-uppercase">Numer licznika</label>
            <input name="nr_licznika_z" id="nr_licznika_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="data_likwidacji_z" class="badge badge-pill badge-secondary text-uppercase">Data Likwidacji</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_likwidacji_z" name="data_likwidacji_z" type="text" value = "" placeholder="">
            </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm mb-3">

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
if ($_GET) {

    if($_GET['id']){
        $id_get = (htmlspecialchars(trim($_GET['id'])));


echo '<script>';
echo 'var objinp = {';
echo tabeladb2('12','SELECT * FROM liczniki LEFT JOIN nieruchomosci_lokalowe ON liczniki.id_pom = nieruchomosci_lokalowe.id WHERE liczniki.id = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_likwidacji_z": "', '4', '",',
'"typ_licznika_z": "', '2', '",',
'"pomieszczenie_nazwa_z": "', '7', '',
' ', '8', '',
', Grupa: ', '10', '',
'', '', '",',
'"pomieszczenie_z": "', '1', '",',
'"nr_licznika_z": "', '3', '" };',
'$("#powrot_button").attr("href", "nieruchomosci_lokalowe_edytuj.php?id=', '1', '");',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', '',
'', '', ''

);
}
if($_GET['id_pom']){
    $id_pom_get = (htmlspecialchars(trim($_GET['id_pom'])));
    echo '<script>';
    echo 'var objinp = {';
    echo tabeladb2('12','SELECT * FROM nieruchomosci_lokalowe WHERE id = '.$id_pom_get.'', '', '',
    '', '', '',
    '', '', '',
    '', '', '',
    '"pomieszczenie_nazwa_z": "', '2', '',
    ' ', '3', '',
    ', Grupa: ', '5', '',
    '', '', '",',
    '"pomieszczenie_z": "', '0', '"',
    '', '', '};',
    '$("#powrot_button").attr("href", "nieruchomosci_lokalowe_edytuj.php?id=', '0', '");',
    '', '', '',
    '', '', '',
    '', '', '',
    '', '', '',
    '', '', '',
    '', '', ''

    );
}
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



    }


}
 else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
echo '
<script>
jQuery(function(){
    jQuery("#zapis_button").click(function () {
        var nowe = {
        "data_likwidacji" : $("#data_likwidacji_z").val(),
        "id_pom" : $("#pomieszczenie_z").val(),
        "nr_licznika" : $("#nr_licznika_z").val(),
        "typ_licznika" : $("#typ_licznika_z").val()
          };

        tabela = "liczniki";
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
