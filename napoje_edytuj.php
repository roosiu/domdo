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
            <a href="napoje.php" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót </a>

            </div>
            <div class="col text-center">
            <form method="post" action="napoje_edytuj.php"><i class="fa fa-coffee" aria-hidden="true"></i> <b>NAPOJE I PRZYDZIAŁ - EDYTUJ</b><span id="input_z_id" style="display: none"> | wpis o id: <span id="id_z_label"></span><input type=hidden disabled size="7" id="id_z"></input></span>
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
            <label for="uwagi_z" class="badge badge-pill badge-secondary text-uppercase">Uwagi</label>
            <textarea class="form-control form-control-sm mb-3" id="uwagi_z" name="uwagi_z" rows="5"></textarea>
            </div>
            <div class="col-sm-2 bg-light border">
            <label for="temperatura_z" class="badge badge-pill badge-secondary text-uppercase">Temperatura w °c</label>
            <input name="temperatura_z" id="temperatura_z" class="form-control form-control-sm"  type="number" value="25" step="1" placeholder="">


            <label for="ilosc_z" class="badge badge-pill badge-secondary text-uppercase">Ilość</label>
            <input name="ilosc_z" id="ilosc_z" class="form-control form-control-sm mb-3" type="number" step="0.1" placeholder="">
            <label id="ilosc_z_etykieta" class="badge badge-pill badge-secondary text-uppercase"></label>
            </div>
            <div class="col-sm-2">
            <label for="faktury_z" class="badge badge-pill badge-secondary text-uppercase">Okres używalności</label>
            <select name="faktury_z" id="faktury_z" size="11" class="form-control form-control-sm mb-3" type="text" placeholder="">
            <option>'.pojed_zapyt('SELECT numer_faktury FROM napoje WHERE `id` ='.$_GET['id']).'</option>
            '.tabeladb2('1','SELECT * FROM faktury WHERE typ="napoje" AND YEAR(data) >= "'.date('Y', strtotime(" -3 year")).'" ORDER BY `id` DESC', '', '', '<option value=', '4', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'
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
                <div class="col-sm-2 mb-3">';
                if (!$_GET) {
                    echo '<button type="button" id="zapis_wiele_button" class="btn btn-dark btn-lg text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Zapisz wszystkim</button>';

                 }
                echo '</div>
                <div class="col-sm-2 mb-3">';

               echo '<button type="button" id="zapis_button" class="btn btn-dark btn-lg text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Zapisz</button>
               </div>
            </div>

        </div>
</form>
</main>';
echo '<script>var pozostalo_z_faktury = {';
    echo tabeladb2('12','SELECT faktury.numer_faktury, faktury.ilosc - Sum(napoje.ilosc) FROM faktury, napoje WHERE faktury.numer_faktury=napoje.numer_faktury AND faktury.typ="napoje" AND YEAR(faktury.data) >= "'.date('Y', strtotime(" -3 year")).'"  group by faktury.numer_faktury', '', '", ',
    '', '', '',
    '"', '0', '": "',
    '', '1', '',
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
    '', '', '',
    '', '', ''

    );
    echo ' };';
echo '

$.each( pozostalo_z_faktury, function( select, value ) {
    $("#faktury_z > option").each(function() {

       if($(this).text() == select) {
        $(this).val(value);
       }

    });
});

$("#faktury_z").on("change", function() {
var numer_faktury_z_pola = $(this).find("option:selected").text();
var ile_szt_na_fakturze_z_pola = $(this).find("option:selected").val();
$("#ilosc_z").attr({
    "max" : ile_szt_na_fakturze_z_pola
 });
 $("#ilosc_z").val("0");
 $("#ilosc_z_etykieta").html("Na fakturze pozostało: "+ile_szt_na_fakturze_z_pola);
});
</script>';
if ($_GET) {

    if($_GET['id']){
        $id_get = (htmlspecialchars(trim($_GET['id'])));

echo '<script>';


echo 'var objinp = {';
echo tabeladb2('12','SELECT * FROM napoje WHERE `id` = '.$id_get.'', '', '',
'"id_z": "', '0', '",',
'"data_z": "', '5', '",',
'', '', '',
'', '', '',
'"uwagi_z": "', '6', '",',
'', '', '',
'"temperatura_z": "', '4', '",',
'"ilosc_z": "', '3', '"',
'', '', '};',
'
var objsel = {
', '', '',
'"faktury_z": "', '1', '",',
'"pracownik_z": "', '2', '"',
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
        "data_wydania" : $("#data_z").val(),
        "uwagi" : $("#uwagi_z").val().replace(/(\r\n|\n|\r)/gm," "),
        "temperatura" : $("#temperatura_z").val(),
        "ilosc" : $("#ilosc_z").val(),
        "pobral" : $("#pracownik_z option:selected").html(),
        "numer_faktury" : $("#faktury_z option:selected").html()
          };

        tabela = "napoje";
        if( !$("#id_z").val() ) {
            createRecord(nowe, tabela);
        } else
        {
            updateRecord($("#id_z").val(), nowe, tabela);

        }


    });


    jQuery("#zapis_wiele_button").click(function () { ///// do zrobienia sprawdzanie czy starczy wody na wszystkich
        if($("#faktury_z option:selected").val() > ($("#ilosc_z").val() * ($("#pracownik_z option").length-1)) ){

        $("#pracownik_z option").each(function() {
        var pracownik = $(this).text();

            var nowe = {
                "data_wydania" : $("#data_z").val(),
                "uwagi" : $("#uwagi_z").val().replace(/(\r\n|\n|\r)/gm," "),
                "temperatura" : $("#temperatura_z").val(),
                "ilosc" : $("#ilosc_z").val(),
                "pobral" : pracownik,
                "numer_faktury" : $("#faktury_z option:selected").html()
                };

                tabela = "napoje";
                if( !$("#id_z").val() && pracownik) {
                  createRecordnotConfirm(nowe, tabela);
                } else
                {

                }

        });
        $("<div></div>").dialog({
            modal: true,
            title: "Informacja",
            open: function () {
                var markup = "Wpisy zostały zapisane";
                $(this).html(markup);
            },
            buttons: {
                Ok: function () {
                    history.back(1);
                    $(this).dialog("close");
                }
            }
        }); //end confirm dialog
    } else {

        $("<div></div>").dialog({
            modal: true,
            title: "Informacja",
            open: function () {
                var markup = "Niewystarczająca ilość na fakturze";
                $(this).html(markup);
            },
            buttons: {
                Ok: function () {
                    $(this).dialog("close");
                }
            }
        });
    }
    });
});

</script>
';

require 'includes/footer.php';
