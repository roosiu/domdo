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

            <a href="dziennik_edytuj.php?id='.($_GET['id']).'" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót do wpisu</a>
            </div>
            <div class="col text-center">
            <i class="fa fa-file-text"></i> <b>GENERATOR PISM</b><span id="input_z_id"> | tworzenie pisma do wpisu o id: <span id="id_z_label">';
            if($_GET['id']){
                $id_get = (htmlspecialchars(trim($_GET['id'])));

            echo $id_get;

            echo '
            <script>
            var data = [];';
                echo tabeladb2('12','SELECT * FROM dziennik WHERE `id` = '.$id_get.'', '', '',
                'data["id_z"]="', '0', '";',
                'data["data_z"]="', '1', '";',
                'termin_uzgodniony_z="', '2', '".split("-"); data["termin_uzgodniony_z"]= termin_uzgodniony_z[2] + "-" + termin_uzgodniony_z[1] + "-" + termin_uzgodniony_z[0] + "r.";',
                'data["termin_faktyczny_z"]="', '3', '";',
                'data["tresc_z"]="', '4', '";',
                'data["adres_nrulicy"]="', '6', '";',
                'data["adres_nrlok"]="', '7', '";',
                'data["zglasza_z"]="', '9', '";',
                'data["kontakt_z"]="', '10', '";',
                'data["adres_ulica_z"]="', '5', '";',
                'data["typ_z"]="', '8', '";',
                'data["zlecono_z"]="', '11', '";',
                '', '', '',
                '', '', '',
                '', '', '',
                '', '', ''

                );
                echo '';
                echo '</script>';

            }



            echo '</span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            <button id="zapis_button" class="btn btn-dark btn-sm text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Dodaj do wpisu</button>
            </div>
            </div>
            <script src="js/editor.js"></script>
            <script>
                $(document).ready(function() {
                    $("#txtEditor").Editor();
                    $("#menu_szablony_div").load("szablony/menu_szablony.html");
                    jQuery("#zapis_button").click(function () {

                        $.ajax({
                            type:"post",
                            url:"szablony/wgraj_szablon.php",
                            data: {"id_z" : data["id_z"],
                            "tresc" : $(".Editor-editor").html()},
                            encode : true,
                            success:function(data){

                               if(data == "ok"){
                                $("<div></div>").dialog({
                                    modal: true,
                                    title: "Informacja",
                                    open: function () {
                                        var markup = "Pismo zostało dodane do wpisu";
                                        $(this).html(markup);
                                    },
                                    buttons: {
                                        Ok: function () {
                                            $(this).dialog("close");
                                        }
                                    }
                                }); //end confirm dialog



                               }else{
                                alert(data);
                               }

                            },
                            error: function(data) {
                                alert("Błąd: "+data);

                             },
                        })



                    });
                });
            </script>
            <div class="container-fluid">
			<div class="row">

				<div class="container">
                    <div class="row">
                        <div class="col-lg-2" id="menu_szablony_div">


                        </div>
						<div class="col-lg-10 nopadding">
							<textarea id="txtEditor"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>';
} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}
require 'includes/footer.php';
