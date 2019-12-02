<!--menu-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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
            <li id="menu_index" class="nav-item active">
              <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Start <span class="sr-only">(current)</span></a>
            </li>
            <li id="menu_dziennik" class="nav-item">
                <a class="nav-link" href="dziennik.php"><i class="fa fa-book"></i> Dziennik</a>
            </li>
            <!-- menu/Pracownicy-->
            <li class="nav-item dropdown bg-dark">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-male"></i> Pracownicy
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="#">Lista pracowników</a>
                <a class="dropdown-item bg-dark text-light" href="#">Kontrola czasu pracy</a>
                <a class="dropdown-item bg-dark text-light" href="#">Karty odzieżowe</a>
                <a class="dropdown-item bg-dark text-light" href="#">Napoje dla pracowników</a>
              </div>
            </li>
            <!-- koniec menu/Pracownicy-->
            <!-- menu/Inwentarz Dropdown -->
            <li class="nav-item dropdown bg-dark">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-building"></i> Inwentarz
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="#">Zamówienia</a>
                <a class="dropdown-item bg-dark text-light" href="#">Magazyn</a>
                <a class="dropdown-item bg-dark text-light" href="#">Inwentarz</a>
              </div>
            </li>
            <!-- koniec menu/Inwentarz Dropdown -->
            <!-- menu/wydruki Dropdown -->
            <li class="nav-item dropdown bg-dark">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-print"></i> Wydruki
              </a>
              <div class="dropdown-menu bg-dark">
                <a class="dropdown-item bg-dark text-light" href="#">Lista obecności</a>
                <a class="dropdown-item bg-dark text-light" href="#">Karty robót</a>
                <a class="dropdown-item bg-dark text-light" href="#">Kontrola czasu</a>
              </div>
            </li>
            <!-- koniec menu/wydruki Dropdown -->
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-phone"></i> Kontakty</a>
            </li>


     </ul>
     <!--menu prawa strona-->
     <ul class="nav navbar-nav ml-auto">
       <!-- menu/ustawienia Dropdown -->
       <li class="nav-item dropdown bg-dark">
         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
           <i class="fa fa-cog"></i> Ustawienia
          </a>
          <div class="dropdown-menu bg-dark">
            <a class="dropdown-item bg-dark text-light" href="#">Ogólne</a>
            <a class="dropdown-item bg-dark text-light" href="#">Wzory pism</a>
            <a class="dropdown-item bg-dark text-light" href="#">Adresy e-mail</a>
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
      <!-- skrypt aktywności przycisków menu -->
<script>
function filename(path){
    path = path.substring(path.lastIndexOf("/")+ 1);
    return (path.match(/[^.]+(\.[^?#]+)?/) || [])[0].slice(0,-4);
}
$(".nav-item").removeClass('active');
$("#menu_"+filename(window.location.pathname)).addClass('active');

</script>
    <!--koniec skryptu aktywności przycisków menu -->