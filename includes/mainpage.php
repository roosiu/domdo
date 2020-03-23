      <!-- treść-->

      <main class="container-fluid">
    <div class="jumbotron mb-n4 bg-white">

                <h5 class="card-header bg-white mb-3"><i class="fa fa-book"></i> Dziś jest 16/11/2019. Zaplanowane zdarzenia</h5>

          <table class="table table-sm table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">data</th>
                  <th scope="col">termin uzgodniony</th>
                  <th scope="col">termin faktyczny</th>
                  <th scope="col">Treść</th>
                  <th scope="col">Adres</th>
                  <th scope="col">Typ zgłoszenia</th>
                  <th scope="col">Zgłaszający</th>
                  <th scope="col">Kontakt</th>
                  <th scope="col">Zlecono</th>
                </tr>
              </thead>
              <tbody>
                <?php

    ///echo tabeladb('0','12','dziennik', '<tr>', '</tr>', '<td>', '</td>');
    echo tabeladb2('12','SELECT * FROM dziennik ORDER BY `id` ASC LIMIT 15', '<tr>', '</tr>', '<td>', '0', '</td>', '<td>', '1', '</td>', '<td>', '2', '</td>', '<td>', '3', '</td>', '<td>', '4', '</td>', '<td>', '5', '', ' ', '6', '', '/', '7', '</td>', '<td>', '8', '</td>', '<td>', '9', '</td>', '<td>', '10', '</td>', '<td>', '11', '</td>', '', '', '', '', '', '', '', '', '', '', '', '');

   ?>
              </tbody>
            </table>

            <a href="#" class="btn btn-primary">Przejdź do zgłoszeń</a>

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
