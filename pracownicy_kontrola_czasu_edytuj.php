<?php

require 'includes/config.php';
require 'includes/header.php';

echo ' <link href="css/kalendarz.css" rel="stylesheet">';

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
                <select name="pracownik_z" id="pracownik_z" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
                <label for="miesiac_z" class="badge badge-pill badge-secondary text-uppercase">Miesiąc: </label>
                <select id="miesiac_z" name="miesiac_z" class="form-control form-control-sm" onchange="jump()">
                <option value=0>1</option>
                <option value=1>2</option>
                <option value=2>3</option>
                <option value=3>4</option>
                <option value=4>5</option>
                <option value=5>6</option>
                <option value=6>7</option>
                    <option value=7>8</option>
                    <option value=8>9</option>
                    <option value=9>10</option>
                    <option value=10>11</option>
                    <option value=11>12</option>
                    </select>
                    <label for="rok_z" class="badge badge-pill badge-secondary text-uppercase">Rok: </label>
                <select id="rok_z" name="rok_z" onchange="jump()" class="form-control form-control-sm">
                <option value = '.(date('Y')).'>'.(date('Y')).'</option>
                <option></option>
                <option value = '.(date('Y', strtotime(" -3 year"))).'>'.(date('Y', strtotime(" -3 year"))).'</option>
                <option value = '.(date('Y', strtotime(" -2 year"))).'>'.(date('Y', strtotime(" -2 year"))).'</option>
                <option value = '.(date('Y', strtotime(" -1 year"))).'>'.(date('Y', strtotime(" -1 year"))).'</option>
                <option value = '.(date('Y', strtotime(" +1 year"))).'>'.(date('Y', strtotime(" +1 year"))).'</option>
                </select>
            </div>

        <div class="col-sm-10 border">
  <!--kalendarz/poczatek-->
            <div class="wrapper">

    <div class="container-calendar">
        <h3 id="monthAndYear"></h3>
<!--
        <div class="button-container-calendar">
            <button id="previous" onclick="previous()">&#8249;</button>
            <button id="next" onclick="next()">&#8250;</button>
        </div>
-->
        <table class="table-calendar" id="calendar" data-lang="en">
            <thead id="thead-month"></thead>
            <tbody id="calendar-body"></tbody>
        </table>

        <div class="footer-container-calendar">

        </div>

    </div>

</div>
<!--kalendarz/koniec-->
            <label for="godziny_z" class="badge badge-pill badge-secondary text-uppercase">Dni</label>
            <textarea class="form-control" id="godziny_z" name="godziny_z" rows="9"></textarea>
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
'"godziny_z": "', '4', '",',
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

    $("#" + select + " option:contains(" + value + ")").attr("selected", "selected");
    $("#input_z_id").show();
    $("#id_z_label").html($("#id_z").val());
};
});


</script>

';


}


}
echo '<script src = "js/kalendarz.js"></script>';
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
        "miesiac" : $("#miesiac_z option:selected").html(),
        "rok" : $("#rok_z option:selected").html(),
        "pracownik" : $("#pracownik_z option:selected").html(),
        "godziny" : $("#godziny_z").val(),
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
