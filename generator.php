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

            }



            echo '</span><input type=hidden disabled size="7" id="id_z"></input></span>
            </div>

            <div class="col-2">
            ??
            </div>
            </div>
            <script src="js/editor.js"></script>
            <script>
                $(document).ready(function() {
                    $("#txtEditor").Editor();
                    $(".Editor-editor").load("szablony/szb_00001.ddo");

                });
            </script>
            <div class="container-fluid">
			<div class="row">

				<div class="container">
                    <div class="row">
                        <div class="col-lg-2">

                                <ul id="menu_szablony">
                                <li class="ui-state-disabled"><div>SZABLONY</div></li>
                                <li><div>Ogłoszenia</div>
                                    <ul>
                                    <li class="ui-state-disabled"><div>Home Entertainment</div></li>
                                    <li><div>Car Hifi</div></li>
                                    <li><div>Utilities</div></li>
                                    </ul>
                                </li>
                                <li><div>Movies</div></li>
                                <li><div>Music</div>
                                    <ul>
                                    <li><div>Rock</div>
                                        <ul>
                                        <li><div>Alternative</div></li>
                                        <li><div>Classic</div></li>
                                        </ul>
                                    </li>
                                    <li><div>Jazz</div>
                                        <ul>
                                        <li><div>Freejazz</div></li>
                                        <li><div>Big Band</div></li>
                                        <li><div>Modern</div></li>
                                        </ul>
                                    </li>
                                    <li><div>Pop</div></li>
                                    </ul>
                                </li>
                                <li class="ui-state-disabled"><div>Specials (n/a)</div></li>
                            </ul>
                            <script>
                            $( function() {
                            $( "#menu_szablony" ).menu();
                            } );
                            </script>
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
