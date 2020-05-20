<?php

require 'includes/config.php';
require 'includes/header.php';

echo ' <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
$(document).ready( function(){

});
$( function() {
  $( "#dialog-info" ).dialog({
    autoOpen: false,
    resizable: false,
    height: "auto",
    width: "350",
    modal: true,
    show: {
      effect: "fade",
      duration: 300
    },
    hide: {
      effect: "fade",
      duration: 300
    }

  });
} );
$( function() {


  $( ".dialog-confirm" ).dialog({
    autoOpen: false,
    resizable: false,
    height: "auto",
    width: "350",
    modal: true,
    show: {
      effect: "fade",
      duration: 300
    },
    hide: {
      effect: "fade",
      duration: 300
    }

  });
  $( ".click-del" ).on( "click", function() {


    $("#dialog-confirm-"+$(this).attr("id")).dialog( "open" );
    $(this).parent("td").parent("tr").addClass("bg-warning");
  });
  $( ".click-del-confirm" ).on( "click", function() {
deleteRecord(($(this).attr("value")),"dziennik");

  });
  $( ".dialog_cancel" ).on( "click", function() {
    $("tr").removeClass("bg-warning");
    $(this).parent("div").dialog( "close" );

  });

} );
</script>
';

if ($user->check()) { // Tylko dla użytkowników zalogowanych
    // Pobierz dane o użytkowniku i zapisz je do zmiennej $userData
    $userData = $user->data();
    /// pobieranie menu
    require 'includes/menu.php';
     /// część main
    echo '<main>
    <div id="dialog-info" title="Informacje dodatkowe">
  </div>
    <div class="jumbotron mb-n4 bg-white">
            <div class="row mb-4">
            <div class="col">
            <button type="button" id="but_div_filtr" class="btn btn-dark btn-sm text-uppercase float-left dontprint"><i class="fa fa-eye-slash" aria-hidden="true"></i> Pokaż/Ukryj filtry</button>
            </div>
            <div class="col text-center">
            <form method="post" action="wydruki_raporty.php"><i class="fa fa-print"></i> <b>RAPORTY</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="submit" id="przycisk_filtr" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" style="display: none"><i class="fa fa-filter" aria-hidden="true"></i> Filtruj</button>
            <button type="reset" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" style="display: none"><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść filtry</button>
            </div>
            </div>
<script>
jQuery(function(){
  jQuery("#but_div_filtr").click(function () {
    jQuery("#div_filtr").toggle("slow");
    jQuery("#przycisk_filtr").toggle("slow");
    jQuery("#przycisk_filtr_wyczysc").toggle("slow");
  });
  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
  });
});
</script>

                <div id="div_filtr" class="row mb-3 dontprint" style="display: none">';
                $filtr_0_rozmiar = '-4';
                $filtr_0_text = 'RODZAJ';
                $filtr_0 = '<select name="rodzaj" id="rodzaj" class="form-control form-control-sm">
                <option></option>
                <option value="wykres kołowy">wykres kołowy</option>
                </select>';
                $filtr_1_rozmiar = '-2';
                $filtr_1_text = 'TYP';
                $filtr_1 = '<select name ="typ" id="typ" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_2_rozmiar = '-3';
                $filtr_2_text = 'ADRES';
                $filtr_2 = '
                <div class="row">
                <div class="col-sm-8 pr-1">
                <select name="adres_ulica" id="adres_ulica" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
                </div>
                <div class="col-sm "><input name="adres_nrbud" id="adres_nrbud" class="form-control form-control-sm" type="text" placeholder="">
                </div></div>';
                $filtr_3_rozmiar = '';
                $filtr_3_text = 'DATA OD';
                $filtr_3 = '
                <input type="text" name="data_od" class="form-control form-control-sm" id="datepicker-10" value = '.(date('Y-m-d', strtotime(" -2 month"))).'>';
                $filtr_4_rozmiar = '';
                $filtr_4_text = 'DATA DO';
                $filtr_4 = '
                <input type = "text" name="data_do" class="form-control form-control-sm" id = "datepicker" value = '.date('Y-m-d').'>';
                for ($x = 0; $x <= 4; $x++) {

                  echo ' <div class="col-sm'.${filtr_.$x._rozmiar}.' px-1">
                  <div class="card bg-light">
                  <div class="card-body p-2">
                      <h6 class="card-title text-center">'.${filtr_.$x._text}.'</h6>
                      <div class="card-text">
                      '.${filtr_.$x}.'
                      </div>

                    </div>
                  </div>
                </div>';}

                echo '</div></form>';


                if ($_POST) {

                $rodzaj = (htmlspecialchars(trim($_POST['rodzaj'])));
                $status = (htmlspecialchars(trim($_POST['status'])));
                $typ = (htmlspecialchars(trim($_POST['typ'])));
                $adres_ulica = (htmlspecialchars(trim($_POST['adres_ulica'])));
                $adres_nrbud = (htmlspecialchars(trim($_POST['adres_nrbud'])));
                $adres_nrlok = (htmlspecialchars(trim($_POST['adres_nrlok'])));
                $data_od = (htmlspecialchars(trim($_POST['data_od'])));
                $data_do = (htmlspecialchars(trim($_POST['data_do'])));

echo
'<script>

var objsel = {
  "rodzaj": "'.$rodzaj.'",
  "status": "'.$status.'",
  "typ": "'.$typ.'",
  "adres_ulica": "'.$adres_ulica.'"
};
var objinp = {
  "adres_nrbud": "'.$adres_nrbud.'",
  "adres_nrlok": "'.$adres_nrlok.'",
  "data_od": "'.$data_od.'",
  "data_do": "'.$data_do.'"
};
$.each( objsel, function( select, value ) {
  $(function() {
    $("[name="+select+"] option").filter(function() {
        return ($(this).val() == value);
      }).prop("selected", true);
      if(value == ""){  }
      else {

        $("#naglowek_dziennik").append(" | "+select+": <i>"+($("#"+select+" option:selected").text())+"</i>" );
      };
    })
  });

  $.each( objinp, function( select, value ) {
    if(value == ""){  }
    else {
    $("input[name="+select+"]").val(value);
    $("#naglowek_dziennik2").append(" | "+select+": <i>"+($("input[name="+select+"]").val())+"</i>");
    };
});

jQuery("#div_filtr").toggle("fast");
jQuery("#przycisk_filtr").toggle("fast");
jQuery("#przycisk_filtr_wyczysc").toggle("fast");


</script>';


if($rodzaj){
  $rodzaj_i = ' AND rodzaj = "'.pojed_zapyt('SELECT imieinazwisko FROM pracownicy WHERE `id` ='.$rodzaj).'"';
}
if($typ){
  $typ_i = ' AND typ = "'.pojed_zapyt('SELECT typ FROM typy WHERE `id` ='.$typ).'"';
}
if($status=='0'){

  $status_i = ' AND data_k = "" ';
}elseif($status=='1'){

  $status_i = ' AND data_k <> "" ';
}
if($adres_ulica){
  $ulica_i = ' AND ulica = "'.pojed_zapyt('SELECT nazwa FROM ulice WHERE `id` ='.$adres_ulica).'"';
}
if($adres_nrbud){
  $adres_nrbud_i = ' AND nr_ulicy = "'.$adres_nrbud.'"';
}
if($adres_nrlok){
  $adres_nrlok_i = ' AND nr_lokalu = "'.$adres_nrlok.'"';
}
if($data_od <> ''){
$data_od_i = ' AND data_p BETWEEN "'.$data_od.'" ';
  if($data_do <> ''){
  $data_do_i = ' AND "'.$data_do.'" ';
  }  else {
    $data_do_i = ' AND "'.date('Y-m-d').'" ';
  }
}
    echo tabeladb2('15','SELECT * FROM dziennik WHERE id IS NOT NULL'.$rodzaj_i.''.$typ_i.''.$ulica_i.''.$adres_nrbud_i.''.$adres_nrlok_i.''.$status_i.''.$data_od_i.''.$data_do_i.' ORDER BY `data_p` ASC', '<tr>', '</tr>',
    '<td><span class="small">', '0', '</span><br/><span class="badge badge-dark dontprint clickable pokazukryj"><i class="fa fa-eye-slash" aria-hidden="true"></i></span></td>',
    '<td>', '1', '</td>',
    '<td>', '2', '</td>',
    '<td>', '3', '</td>',
    '<td class="small">', '4', '</td>',
    '<td>', '5', '',
    ' ', '6', '',
    '/', '7', '</td>',
    '<td class="small">', '8', '</td>',
    '<td>', '9', '</td>',
    '<td>', '10', '</td>',
    '<td>', '11', '</td>',
    '<td class="text-center dontprint text-nowrap"><a href="dziennik_edytuj.php?id=', '0', '" role="button" class="btn btn-dark btn-sm text-uppercase"><i class="fa fa-pencil" aria-hidden="true"></i>edytuj</a></td>',
     '<td class="text-center dontprint text-nowrap"><button id="', '0', '" class="click-del btn btn-dark btn-sm text-uppercase"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button></td>',
     '<div class="dialog-confirm" id="dialog-confirm-', '0', '" title="Potwierdzenie usuwania"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Czy napewno usunąć wpis? Przywrócenie go nie będzie możliwe</p>',
     '<button value="', '0', '" class="click-del-confirm btn btn-danger btn-sm text-uppercase text-white"><i class="fa fa-trash-o" aria-hidden="true"></i> usuń</button>
     <button class="btn btn-dark btn-sm dialog_cancel float-right text-uppercase">anuluj</button>
     </div>'
    );


} else
echo "<script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('wykres'));

        chart.draw(data, options);
      }
    </script>";
{






                }
                echo '




                </div>


                <center><div id="wykres" style="width: 900px; height: 500px;"></div></center>

              </main>';

/// koniec części main
/// dodawanie przycisku niedrukowania wybranych zdarzeń z tabeli




} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
