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
                'data["termin_uzgodniony_z"]="', '2', '";',
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
            <a href="dziennik_edytuj.php?id='.($_GET['id']).'" role="button" class="btn btn-dark btn-sm text-uppercase float-right"><i class="fa fa-chevron-left " aria-hidden="true"></i> Powrót do wpisu</a>
            <a href="generator.php?zapis='.($_GET['id']).'" role="button" class="btn btn-dark btn-sm text-uppercase float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Dodaj do wpisu</a>
            </div>
            </div>
            <script src="js/editor.js"></script>
            <script>
                $(document).ready(function() {
                    $("#txtEditor").Editor();
                    $("#menu_szablony_div").load("szablony/menu_szablony.html");

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
