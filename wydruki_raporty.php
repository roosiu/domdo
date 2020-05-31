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
                $filtr_0_rozmiar = '';
                $filtr_0_text = 'TYP';
                $filtr_0 = '<select name ="typ" id="typ" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM typy ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
                $filtr_1_rozmiar = '';
                $filtr_1_text = 'ADRES';
                $filtr_1 = '
                <div class="row">
                <div class="col-sm-8 pr-1">
                <select name="adres_ulica" id="adres_ulica" class="form-control form-control-sm"><option></option>'.tabeladb2('1','SELECT * FROM ulice ORDER BY `id` ASC', '', '', '<option value=', '0', ">", "", "1", "</option>", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>
                </div>
                <div class="col-sm "><input name="adres_nrbud" id="adres_nrbud" class="form-control form-control-sm" type="text" placeholder="">
                </div></div>';
                $filtr_2_rozmiar = '';
                $filtr_2_text = 'DATA OD';
                $filtr_2 = '
                <input type="text" name="data_od" class="form-control form-control-sm" id="datepicker-10" value = '.(date('Y-m-d', strtotime(" -2 month"))).'>';
                $filtr_3_rozmiar = '';
                $filtr_3_text = 'DATA DO';
                $filtr_3 = '
                <input type = "text" name="data_do" class="form-control form-control-sm" id = "datepicker" value = '.date('Y-m-d').'>';
                for ($x = 0; $x <= 3; $x++) {

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
if($data_od <> ''){
$data_od_i = ' AND data_p BETWEEN "'.$data_od.'" ';
  if($data_do <> ''){
  $data_do_i = ' AND "'.$data_do.'" ';
  }  else {
    $data_do_i = ' AND "'.date('Y-m-d').'" ';
  }
}


function CountTheMonth($startDate,$endDate,$order)
{
    $startDate = strtotime($startDate);
    $endDate   = strtotime($endDate);

    $ASC_Month = $startDate;
    $DESC_Month = $endDate;
    $Y_Axis = Array();

    if($order == 'DESC')//Big to small
    {
        while ($DESC_Month >= $startDate)
        {
            $Y_Axis[] = date('F-Y',$DESC_Month);
            $DESC_Month = strtotime( date('Y-m-d',$DESC_Month).' -1 month');
        }
        return $Y_Axis;
    }
    elseif($order == 'ASC')//Small to big
    {
        while ($ASC_Month <= $endDate)
        {
            $Y_Axis[] = date('Y-m',$ASC_Month);
            $ASC_Month = strtotime( date('Y-m-d',$ASC_Month).' +1 month');
        }
        return $Y_Axis;
    }
}
/////
echo "    <script type='text/javascript'>
$(window).on('load', function() {
  $( '#wykres' ).hide();
$( '#wykres2' ).hide();
$( '#wykres3' ).hide();
$( '#wykres4' ).hide();
})


google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([";
  echo '["Miesiąc","liczba zgłoszeń"]';
  for($i=0; $i<count(CountTheMonth($data_od,$data_do,'ASC')); $i++){
echo ',["'.date('m/Y', strtotime(CountTheMonth($data_od,$data_do,'ASC')[$i])).'"';

  echo tabeladb2('15','SELECT COUNT(*) FROM `dziennik` WHERE YEAR(data_p)='.date('Y', strtotime(CountTheMonth($data_od,$data_do,'ASC')[$i])).' AND MONTH(data_p)="'.date('m', strtotime(CountTheMonth($data_od,$data_do,'ASC')[$i])).'"'.$typ_i.''.$ulica_i.''.$adres_nrbud_i.'', ',', '',
  '', '0', '',
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
  '', '', '',
  '', '', '',
  '', '', '',
  '', '', ''
   );
   echo "]";
  }
    echo "]);

  var options = {
    title: 'Statystyka ilości zgłoszeń: ".pojed_zapyt('SELECT typ FROM typy WHERE `id` ='.$typ)." na osi czasu od ".date('m/Y', strtotime($data_od))." do ".date('m/Y', strtotime($data_do))."',
    hAxis: {title: 'Miesiąc',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0},
    legend: 'none'
  };

  var chart = new google.visualization.AreaChart(document.getElementById('wykres5'));
  chart.draw(data, options);
}
</script>
";
//////
echo "<script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([";
        echo "
          ['Task', 'Hours per Day']
          ";

          echo tabeladb2('15','SELECT ulica,nr_ulicy,COUNT(*) FROM dziennik WHERE data_p >="'.$data_od.'" AND data_p <= "'.$data_do.'"'.$typ_i.''.$ulica_i.''.$adres_nrbud_i.' GROUP BY nr_ulicy ORDER BY COUNT(*)', ',[', ']',
          '"', '0', '',
          ' ', '1', '"',
          ',', '2', '',
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
          '', '', '',
          '', '', ''
           );

          echo "
        ]);

        var options = {
          title: 'Statystyka zgłoszeń z budynków: ".pojed_zapyt('SELECT typ FROM typy WHERE `id` ='.$typ)." od ".date('m/Y', strtotime($data_od))." do ".date('m/Y', strtotime($data_do))."',

        };

        var chart = new google.visualization.PieChart(document.getElementById('wykres6'));

        chart.draw(data, options);
      }
    </script>";
} else {
  //////////////////
echo "<script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([";
        echo "
          ['Task', 'Hours per Day']
          ";
          echo tabeladb2('15','SELECT typ,COUNT(*) FROM dziennik  WHERE YEAR(data_p)=YEAR(CURDATE()) GROUP BY typ ORDER BY COUNT(*)', ',[', ']',
          '"', '0', '"',
          ',', '1', '',
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
          '', '', '',
          '', '', '',
          '', '', ''
           );
          echo "
        ]);

        var options = {
          title: 'Statystyka typów zgłoszeń w roku '+ (new Date).getFullYear()+' ogółem',

        };

        var chart = new google.visualization.PieChart(document.getElementById('wykres'));

        chart.draw(data, options);
      }
    </script>";
////////////////
echo "    <script type='text/javascript'>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([";
  echo '["Miesiąc"';
  echo tabeladb2('15','SELECT * FROM typy ORDER BY typ', ',', '',
  '"', '1', '"',
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
  '', '', '',
  '', '', '',
  '', '', '',
  '', '', ''
   );

echo "]";
for ($i = 1; $i <= date('m'); $i++) {
echo ',["'.$i.' / '.date("Y").'"';
  echo tabeladb2('15','SELECT typy.typ, COUNT(dziennik.typ)
  FROM typy
  LEFT JOIN dziennik
  ON typy.typ = dziennik.typ AND YEAR(dziennik.data_p)=YEAR(CURDATE()) AND MONTH(dziennik.data_p)='.$i.'
  GROUP BY typy.typ ORDER BY typy.typ', ',', '',
  '', '1', '',
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
  '', '', '',
  '', '', '',
  '', '', '',
  '', '', ''
   );
   echo "]";
  }
    echo "]);

  var options = {
    title: 'Statystyka według miesięcy w roku '+ (new Date).getFullYear()+'',
    hAxis: {title: 'Miesiąc',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0}
  };

  var chart = new google.visualization.AreaChart(document.getElementById('wykres2'));
  chart.draw(data, options);
}
</script>
";

////////////////////
echo "<script type='text/javascript'>
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([";
        echo "
          ['Task', 'Hours per Day']
          ";
          echo tabeladb2('15','SELECT ulica,nr_ulicy,COUNT(*) FROM dziennik WHERE YEAR(data_p)=YEAR(CURDATE()) GROUP BY nr_ulicy ORDER BY COUNT(*)', ',[', ']',
          '"', '0', '',
          ' ', '1', '"',
          ',', '2', '',
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
          '', '', '',
          '', '', ''
           );
          echo "
        ]);

        var options = {
          title: 'Statystyka zgłoszeń z budynków w roku '+ (new Date).getFullYear()+' ogółem',

        };

        var chart = new google.visualization.PieChart(document.getElementById('wykres3'));

        chart.draw(data, options);
      }
    </script>";


    /////////////////////
    echo "    <script type='text/javascript'>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([";
  echo '["Miesiąc","liczba zgłoszeń"]';
for ($i = 1; $i <= date('m'); $i++) {
echo ',["'.$i.' / '.date("Y").'"';
  echo tabeladb2('15','SELECT COUNT(*) FROM `dziennik` WHERE YEAR(data_p)=YEAR(CURDATE()) AND MONTH(data_p)="'.$i.'"', ',', '',
  '', '0', '',
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
  '', '', '',
  '', '', '',
  '', '', '',
  '', '', ''
   );
   echo "]";
  }
    echo "]);

  var options = {
    title: 'Statystyka ilości zgłoszeń na osi czasu w roku '+ (new Date).getFullYear()+' ogółem',
    hAxis: {title: 'Miesiąc',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0}
  };

  var chart = new google.visualization.AreaChart(document.getElementById('wykres4'));
  chart.draw(data, options);
}
</script>
";


                }
                echo '




                </div>

                <div class="row">

                    <center><div class="col-sm" id="wykres" style="width: 950px; height: 700px;"></div></center>
                    <center><div class="col-sm" id="wykres2" style="width: 950px; height: 700px;"></div></center>

                </div>

                <div class="row">

                    <center><div class="col-sm" id="wykres4" style="width: 950px; height: 700px;"></div></center>
                    <center><div class="col-sm" id="wykres3" style="width: 950px; height: 700px;"></div></center>

                    </div>

                <center><div class="col-sm" id="wykres5" style="width: 100%; height: 700px;"></div></center>
                <center><div class="col-sm" id="wykres6" style="width: 100%; height: 700px;"></div></center>
              </main>';

/// koniec części main
/// dodawanie przycisku niedrukowania wybranych zdarzeń z tabeli




} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
