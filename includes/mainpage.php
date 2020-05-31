      <!-- treść-->
<script>
$(window).on("load", function() {
$("#naglowek_data").html($.datepicker.formatDate("yy-mm-dd", new Date()));
});
</script>
      <main class="container-fluid">
    <div class="jumbotron mb-n4 bg-white">

                <h5 class="card-header bg-white mb-3"><i class="fa fa-book"></i> Dziś jest <span id="naglowek_data"></span>. Zaplanowane zdarzenia na dziś: </h5>

          <table class="table table-sm table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Data</th>
                  <th scope="col">Treść</th>
                  <th scope="col">Adres</th>
                  <th scope="col">Typ zgłoszenia</th>
                  <th scope="col">Zgłaszający</th>
                  <th scope="col">Kontakt</th>
                  <th scope="col">Zlecono</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

    echo tabeladb2('12','SELECT * FROM dziennik WHERE data_u = CURDATE() AND data_k = "" ORDER BY `id` ASC', '<tr>', '</tr>', '<td>', '0', '</td>', '<td>', '2', '</td>', '', '', '', '', '', '', '<td>', '4', '</td>', '<td>', '5', '', ' ', '6', '', '/', '7', '</td>', '<td>', '8', '</td>', '<td>', '9', '</td>', '<td>', '10', '</td>', '<td>', '11', '</td>', '<td><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>', '', '', '', '', '', '', '', '', '');

   ?>
              </tbody>
            </table>

            <h5 class="card-header bg-white mb-3"><i class="fa fa-calendar"></i> Zaplanowane na najbliższe 30 dni </h5>

<table class="table table-sm table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Data</th>
        <th scope="col">Treść</th>
        <th scope="col">Adres</th>
        <th scope="col">Typ zgłoszenia</th>
        <th scope="col">Zgłaszający</th>
        <th scope="col">Kontakt</th>
        <th scope="col">Zlecono</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php

echo tabeladb2('12','SELECT * FROM dziennik WHERE data_u > CURDATE() AND data_u < CURDATE() + INTERVAL 31 DAY AND data_k = "" ORDER BY `data_u` ASC', '<tr>', '</tr>', '<td>', '0', '</td>', '<td>', '2', '</td>', '', '', '', '', '', '', '<td>', '4', '</td>', '<td>', '5', '', ' ', '6', '', '/', '7', '</td>', '<td>', '8', '</td>', '<td>', '9', '</td>', '<td>', '10', '</td>', '<td>', '11', '</td>', '<td><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>', '', '', '', '', '', '', '', '', '');

?>
    </tbody>
  </table>
          <!--<a href="dziennik.php" class="btn btn-dark btn-sm text-uppercase float-left dontprint">Przejdź do zgłoszeń</a>-->

</div>
</div>



          <div class="row">
              <div class="col-sm-8 mb-3">
                <div class="card">
                    <h5 class="card-header"><i class="fa fa-sun-o"></i> Pogoda</h5>
                  <div class="card-body">
                    <p class="card-text">
                        <a class="weatherwidget-io" href="https://forecast7.com/pl/52d8918d41/gniewkowo/" data-label_1="GNIEWKOWO" data-label_2="POGODA" data-icons="Climacons" data-theme="pure" >GNIEWKOWO POGODA</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
                    </p>

                  </div>
                </div>
              </div>
              <div class="col-sm-4 mb-3">
                <div class="card">
                    <h5 class="card-header"> <i class="fa fa-phone"></i> Kontakty</h5>
                  <div class="card-body">
                    <p class="card-text">
                      <input class="form-control" type="text" placeholder="Szukaj…">
                    </p>
                   <?php echo tabeladb('0','5','kontakty','-','<br>','<p>','</p>');            ?>
                  </div>
                </div>
              </div>
            </div>
          <!-- Content here -->
         </main>
        <!--koniec treść-->
        <!--koniec treść-->
