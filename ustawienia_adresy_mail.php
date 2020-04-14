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
                ' <td class="text-left"><input class="form-control form-control-sm" id="', '1', '_z" type="text" ',
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
            ';





        echo tabeladb2('15','SELECT * FROM ustawienia_adresy_mail ORDER BY `id` ASC', '', ',',
        '"', '1', '" : ',
        '$("#', '1', '_z").val()',
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
         '', '', '',
         '', '', ''
        );
        echo '  };

        tabela = "ustawienia_adresy_mail";
';
echo '$.each( nowe, function( key, value ) {
    UpdateMailOpt(key, value, tabela);

  });
  ';





echo '

$("<div></div>").dialog({
    modal: true,
    title: "Informacja",
    open: function () {
        var markup = "Zapisano ustawienia";
        $(this).html(markup);
    },
    buttons: {
        Ok: function () {
            $(this).dialog("close");
        }
    }
}); //end confirm dialog


    });
});
</script>
';

require 'includes/footer.php';
