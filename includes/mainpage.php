      <!-- treść-->
<script>
$(window).on("load", function() {
$("#naglowek_data").html($.datepicker.formatDate("yy-mm-dd", new Date()));

$("a").addClass("dontprint");
});
</script>
      <main class="container-fluid">
    <div class="jumbotron mb-n4 bg-white">
    <div>    <h5 class="card-header bg-dark mb-3 text-light"><i class="fa fa-hourglass-end"></i> Po terminie <a class="btn btn-light btn-sm text-uppercase float-right rozwin" href="#" role="button"><i class="fa fa-eye-slash" aria-hidden="true"></i> pokaż/ukryj</a></h5>

<table id="table_po_terminie" class="table table-sm table-striped table-hover" style="display: none">
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

echo tabeladb2('12','SELECT * FROM dziennik WHERE data_u < CURDATE() AND data_u > CURDATE() - INTERVAL 7 DAY AND data_k = "" ORDER BY `data_u` ASC', '<tr>', '</tr>', '<td>', '0', '</td>', '<td>', '2', '</td>', '', '', '', '', '', '', '<td>', '4', '</td>', '<td>', '5', '', ' ', '6', '', '/', '7', '</td>', '<td>', '8', '</td>', '<td>', '9', '</td>', '<td>', '10', '</td>', '<td>', '11', '</td>', '<td><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i> edytuj</a></td>', '', '', '', '', '', '', '', '', '');

?>
    </tbody>
  </table>
  </div>

<div>
                <h5 class="card-header bg-dark text-light mb-3"><i class="fa fa-hourglass-half"></i> Dziś jest <span id="naglowek_data"></span>. Zaplanowane zdarzenia na dziś: <a class="btn btn-light btn-sm text-uppercase float-right rozwin" href="#" role="button"><i class="fa fa-eye-slash" aria-hidden="true"></i> pokaż/ukryj</a></h5>

          <table id="table_dzis" class="table table-sm table-striped table-hover">
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
            </div>
        <div>    <h5 class="card-header bg-dark text-light mb-3"><i class="fa fa-hourglass-start"></i> Zaplanowane na najbliższe 30 dni <a class="btn btn-light btn-sm text-uppercase float-right rozwin" href="#" role="button"><i class="fa fa-eye-slash" aria-hidden="true"></i> pokaż/ukryj</a></h5>

<table id="table_zaplanowane" class="table table-sm table-striped table-hover">
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
  </div>
          <!--<a href="dziennik.php" class="btn btn-dark btn-sm text-uppercase float-left dontprint">Przejdź do zgłoszeń</a>-->

</div>
</div>



          <div class="row dontprint">
              <div class="col-sm-4 mb-3">
                <div class="card">
                    <h5 class="card-header bg-dark text-light"><i class="fa fa-search"></i> Szukaj po adresie</h5>
                  <div class="card-body">
                    <p class="card-text">
                       <form method="post" action="dziennik.php">
                        <div class="row">
                          <div class="col-sm-6 pr-1">
                            <select name="adres_ulica" id="adres_ulica" class="form-control form-control-sm"><option></option>
                            <?php echo tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""); ?>
                            </select>
                          </div>
                          <div class="col"><input name="adres_nrbud" id="adres_nrbud" class="form-control form-control-sm" type="text" placeholder="">
                          </div>
                            /
                          <div class="col">
                              <input name="adres_nrlok" id="adres_nrlok" class="form-control form-control-sm" type="text" placeholder="">
                          </div>
                        </div>
                        <button type="submit" id="przycisk_filtr" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3"><i class="fa fa-search" aria-hidden="true"></i> SZUKAJ</button>

                       </form>
                    </p>

                  </div>
                </div>
              </div>
              <div class="col-sm-4 mb-3">
                <div class="card">
                    <h5 class="card-header bg-dark text-light"><i class="fa fa-sun-o"></i> Pogoda</h5>
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
                    <h5 class="card-header bg-dark text-light"> <i class="fa fa-phone"></i> Kontakty</h5>
                  <div class="card-body">
                    <p class="card-text">
                      <input id="contact_search" oninput="contact_search_action(this)" class="form-control" type="text" placeholder="Szukaj…">
                    </p>
                   <?php
                      echo tabeladb2('15','SELECT * FROM kontakty ORDER BY `id`', '<div class="d-none">', '</div>',
                      '<div id="con_box_', '0', '">',
                      '<b class="con_box">', '1', '</b><br>',
                      '', '', '',
                      ' ', '2', '<br>',
                      ' kontakt: <u>', '3', '</u><br>',
                      ' ', '4', '',
                      ' ', '5', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '</div><hr>',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', '',
                      ' ', '', ''
                    );
              ?>
              <script>
              function contact_search_action(e){
                var con_box = document.getElementsByClassName("con_box");

                if(e.value.length>=3){
                  for (let index = 0; index < con_box.length; index++) {

                    var re = new RegExp(e.value, 'gi');
                    if(con_box[index].innerHTML.match(re)){

                      con_box[index].parentElement.parentElement.classList.remove("d-none");
                   ///   console.log(con_box[index].innerHTML);
                    } else {
                      con_box[index].parentElement.parentElement.classList.add("d-none");
                    }

                  }
                } else {

                }
              }
              </script>
                  </div>
                </div>
              </div>
            </div>
          <!-- Content here -->
         </main>
        <!--koniec treść-->
        <script src="js/hiderow.js">
        </script>
        <script>
        $(".rozwin").click(function() {

   $(this).parent().parent().children('table').toggle("slow");
});

hiderow("table_po_terminie", [0,1,4,5,6,7]);
hiderow("table_dzis", [0,1,4,5,6,7]);
hiderow("table_zaplanowane", [0,1,4,5,6,7]);
</script>

        <!--koniec treść-->
