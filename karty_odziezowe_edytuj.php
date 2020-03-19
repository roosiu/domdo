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
            <a href="karty_odziezowe.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="karty_odziezowe_edytuj.php"><i class="fa fa-user-secret" aria-hidden="true"></i> <b>KARTY ODZIEŻOWE - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            </div>
            </div>

            <div class="row mb-4 border rounded">
            <div class="col-sm-2 bg-light border">
            <label for="data_z" class="badge badge-pill badge-secondary text-uppercase">Data pobrania</label>
            <input class="form-control form-control-sm mb-3 datepicker" id="data_z" name="data_z" type="text" value = '.date('Y-m-d').' placeholder="">
            </div>
            <div class="col-sm-4" id="div_uwagi_z">
            <label for="nazwa_z" class="badge badge-pill badge-secondary text-uppercase">Nazwa</label>
            <input name="nazwa_z" id="nazwa_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="uwagi_z" class="badge badge-pill badge-secondary text-uppercase">Uwagi</label>
            <textarea class="form-control form-control-sm mb-3" id="uwagi_z" name="uwagi_z" rows="5"></textarea>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="rozmiar_z" class="badge badge-pill badge-secondary text-uppercase">Rozmiar</label>
            <input name="rozmiar_z" id="rozmiar_z" class="form-control form-control-sm" type="text" placeholder="">
            <label for="wartosc_z" class="badge badge-pill badge-secondary text-uppercase">Wartość</label>
            <input name="wartosc_z" id="wartosc_z" class="form-control form-control-sm" type="text" placeholder="">


            <label for="ilosc_z" class="badge badge-pill badge-secondary text-uppercase">Ilość</label>
            <input name="ilosc_z" id="ilosc_z" class="form-control form-control-sm mb-3" type="number" placeholder="">
            <label for="nr_dowodu_wyd_z" class="badge badge-pill badge-secondary text-uppercase">Nr dowodu wydania</label>
            <input name="nr_dowodu_wyd_z" id="nr_dowodu_wyd_z" class="form-control form-control-sm mb-3" type="text" placeholder="">
            </div>
            <div class="col-sm-2">
            <label for="okres_uz_z" class="badge badge-pill badge-secondary text-uppercase">Okres używalności</label>
            <select name="okres_uz_z" id="okres_uz_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
           <option value="9m">9m</option>
           <option value="12m">12m</option>
           <option value="18m">18m</option>
           <option value="24m">24m</option>
           <option value="36m">36m</option>
           <option value="48m">48m</option>
           <option value="96m">96m</option>
           <option value="3 o.z.">3 o.z.</option>
           <option value="6 o.z.">6 o.z.</option>
           <option value="d.z.">d.z.</option>
            </select>
            </div>
            <div class="col-sm-2 border bg-light">
            <label for="pracownik_z" class="badge badge-pill badge-secondary text-uppercase">Pracownik</label>
            <select name="pracownik_z" id="pracownik_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option></option>
            '.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
            </select>
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
echo tabeladb2('12','SELECT * FROM karty_odziezowe WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_z": "', '7', '",',
'"nazwa_z": "', '2', '",',
'', '', '',
'"uwagi_z": "', '9', '",',
'"wartosc_z": "', '5', '",',
'"rozmiar_z": "', '3', '",',
'"ilosc_z": "', '4', '",',
'"nr_dowodu_wyd_z": "', '6', '" };',
'
var objsel = {
', '', '',
'"okres_uz_z": "', '8', '",',
'"pracownik_z": "', '1', '"',
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
    $("#pliki_zapis").removeClass( "d-none" );
};
});
$.each( objsel, function( select, value ) {
    if(value == ""){  }
    else {

        $("#" + select + " option:contains(" + value + ")").attr("selected", "selected");
    };
});


</script>

';



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
        "data_pobr" : $("#data_z").val(),
        "tresc" : $("#tresc_z").val(),
        "wartosc" : $("#wartosc_z").val(),
        "rozmiar" : $("#rozmiar_z").val(),
        "okres_uz" : $("#okres_uz_z option:selected").html(),
        "ilosc" : $("#ilosc_z").val(),
        "nazwa" : $("#nazwa_z").val(),
        "nr_dowodu_wyd" : $("#nr_dowodu_wyd_z").val(),
        "pracownik" : $("#pracownik_z option:selected").html()
          };

        tabela = "karty_odziezowe";
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
