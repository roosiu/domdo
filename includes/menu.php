<style>
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu>a:after {
  content: "\f0da";
  float: right;
  border: none;
  font-family: 'FontAwesome';
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: 0px;
  margin-left: 0px;
}
</style>
<!--menu-->
<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
      <!--menu/logo-->
        <a class="navbar-brand" href="#">
            <img src="img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
          <b>domdo</b></a>
          <!--koniec menu/logo-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li id="menu_index" class="nav-item menu_index active">
              <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Start <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item menu_dziennik">
                <a class="nav-link" href="dziennik.php"><i class="fa fa-book"></i> Dziennik</a>
            </li>
            <!-- menu/Pracownicy-->
            <li class="nav-item dropdown bg-dark menu_pracownicy">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-male"></i> Pracownicy
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="pracownicy_lista.php"><i class="fa fa-users" aria-hidden="true"></i> Lista pracowników</a>
                <a class="dropdown-item bg-dark text-light" href="pracownicy_kontrola_czasu.php"><i class="fa fa-clock-o" aria-hidden="true"></i> Kontrola czasu pracy</a>
                <a class="dropdown-item bg-dark text-light" href="karty_odziezowe.php"><i class="fa fa-user-secret" aria-hidden="true"></i> Karty odzieżowe</a>


                    <a id="dropdownMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle bg-dark text-light"><i class="fa fa-coffee" aria-hidden="true"></i> Napoje dla pracowników</a>
                    <ul aria-labelledby="dropdownMenu2" class="dropdown-menu border-0 shadow bg-dark text-light">
                      <li>
                        <a tabindex="-1" href="napoje.php" class="dropdown-item bg-dark text-light"><i class="fa fa-coffee" aria-hidden="true"></i> Przydział</a>
                      </li>

                      <li><a href="faktury.php" class="dropdown-item bg-dark text-light"><i class="fa fa-money" aria-hidden="true"></i> Faktury</a></li>
                    </ul>


              </div>
            </li>
            <!-- koniec menu/Pracownicy-->
            <!-- menu/Inwentarz Dropdown -->
            <li class="nav-item dropdown bg-dark menu_inwentarz">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-building"></i> Inwentarz
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Zamówienia</a>
                <a class="dropdown-item bg-dark text-light" href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Magazyn</a>
                <a class="dropdown-item bg-dark text-light" href="inwentarz.php"><i class="fa fa-university" aria-hidden="true"></i> Inwentarz</a>
                <a class="dropdown-item bg-dark text-light" href="faktury.php"><i class="fa fa-money" aria-hidden="true"></i> Faktury</a>
              </div>
            </li>
            <!-- koniec menu/Inwentarz Dropdown -->
            <!-- menu/wydruki Dropdown -->
            <li class="nav-item dropdown bg-dark menu_wydruki">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-print"></i> Wydruki
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="wydruki_lista_obecnosci.php">Lista obecności</a>
                <a class="dropdown-item bg-dark text-light" href="wydruki_karty_robot.php">Karty robót</a>
                <a class="dropdown-item bg-dark text-light" href="#">Kontrola czasu</a>
              </div>
            </li>
            <!-- koniec menu/wydruki Dropdown -->
            <li class="nav-item menu_kontakty">
                <a class="nav-link" href="kontakty.php"><i class="fa fa-phone"></i> Kontakty</a>
            </li>


     </ul>
     <!--menu prawa strona-->
     <ul class="nav navbar-nav ml-auto">
       <!-- menu/ustawienia Dropdown -->
       <li class="nav-item dropdown bg-dark menu_ustawienia">
         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           <i class="fa fa-cog"></i> Ustawienia
          </a>
          <div class="dropdown-menu bg-dark">
            <a class="dropdown-item bg-dark text-light" href="ustawienia_ogolne.php">Ogólne</a>
            <a class="dropdown-item bg-dark text-light" href="#">Wzory pism</a>
            <a class="dropdown-item bg-dark text-light" href="ustawienia_adresy_mail.php">Adresy e-mail</a>
          </div>
        </li>
        <!-- koniec menu prawa strona/ustawienia Dropdown -->
        <li class="nav-item dropdown bg-dark">
         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           <i class="fa fa-user-circle-o"></i>       <?php
echo $userData['fullname'];
?>
          </a>
          <div class="dropdown-menu bg-dark">
            <a class="dropdown-item bg-dark text-light" href="profile.php?id=<? echo zakodowanie($userData["id"]); ?>">Profil</a>
            <a class="dropdown-item bg-dark text-light" href="logout.php"><i class="fa fa-sign-out"></i> Wyloguj</a>

          </div>
        </li>




    </ul>
    <!--koniec menu prawa strona-->
  </div>
      </nav>
      <!--koniec menu-->
  <script>
$(function() {
  // ------------------------------------------------------- //
  // Multi Level dropdowns
  // ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");


    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });

  });
});


</script>
    <!--koniec skryptu aktywności przycisków menu -->