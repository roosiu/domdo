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
            <div class="row mb-4 dontprint">
            <div class="col">
            </div>
            <div class="col text-center">
            <form method="post" action="wydruki_karty_wyposazenia.php"><i class="fa fa-print" aria-hidden="true"></i> <b>KARTY EWIDENCJI WYPOSAŻENIA</b> <br/><span class="small" id="naglowek_dziennik"></span><span class="small" id="naglowek_dziennik2"></span>
            </div>
            <div class="col">
            <button type="submit" id="przycisk_generuj" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-magic" aria-hidden="true"></i> Generuj</button>
            <button type="button" id="przycisk_filtr_wyczysc" class="btn btn-dark btn-sm text-uppercase float-right dontprint m-3" ><i class="fa fa-eraser" aria-hidden="true"></i> Wyczyść </button>

            </div>
            </div>
<script>
jQuery(function(){




  jQuery("#przycisk_filtr_wyczysc").click(function () {
    $(":input").val("");
    $(function () {
      $.get("wydruki_karty_wyposazenia_podglad.htm", function (data) {
        $(".Editor-editor").html(data)
      });
    });
  });
});
</script>
<div id="div_filtr" class="row mb-3 dontprint justify-content-center">';

$filtr_0_rozmiar = '-2 my-2';
$filtr_0_text = 'TYP';
$filtr_0 = '<select name="typ" id="typ" class="form-control form-control-sm">
<option value="odzież">odzież</option>
<option value="wyposażenie 50-200">wyposażenie 50-200</option>
<option value="wyposażenie 200-2000">wyposażenie 200-2000</option>
</select>';
$filtr_1_rozmiar = '-3 my-2';
$filtr_1_text = 'PRACOWNIK';
$filtr_1 = '<select name="pracownik" id="pracownik" class="form-control form-control-sm">'.tabeladb2('1','SELECT * FROM pracownicy ORDER BY `id` ASC', '', '', '<option value="', '1', '">', '', '1', '</option>', "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "").'</select>';
$filtr_2_rozmiar = '-3 my-2';
$filtr_2_text = 'JEDNOSTKA ORGANIZACYJNA';
$filtr_2 = '<input type="text" class="form-control form-control-sm" id="jednos" name="jednos" value="
'.pojed_zapyt('SELECT nazwa_jednostki FROM ustawienia_ogolne WHERE `id` = 1').'">';



for ($x = 0; $x <= 2; $x++) {
if($x==7){
}
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




                echo '</form>';









                   echo' <script src="js/editor.js"></script>
<script>
$(document).ready(function() {
  $("#txtEditor").Editor();

  $(function () {
    $.get("wydruki_karty_wyposazenia_podglad.htm", function (data) {
      $(".Editor-editor").html(data);';

      if ($_POST) {
        $jednos = (htmlspecialchars(trim($_POST['jednos'])));
        $typ = (htmlspecialchars(trim($_POST['typ'])));
        $pracownik = (htmlspecialchars(trim($_POST['pracownik'])));

        echo '$(".wpis_wzor").remove();';
        echo 'jQuery("#pole_jednos").html("'.$jednos.' - '.$typ.'");';
        echo 'jQuery("#dane_pracownika").html("'.$pracownik.'<b><br>Miejsce zamieszkania</b> '.pojed_zapyt('SELECT adres FROM pracownicy WHERE `imieinazwisko` = "'.$pracownik.'"').'<b><br></b>_______________________________<b> Nr ewidencyjny </b>___________________");';
        echo 'var liczenie_liczba_zmian = 1;';
        if($typ == "odzież"){
          echo tabeladb2('15', 'SELECT * FROM karty_odziezowe WHERE pracownik="'.$pracownik.'" ORDER BY id ASC', '', '',
         '$("#tabela_wykaz").append("<tr style=\u0022height:17.0pt\u0022><td width=44 colspan=2 rowspan=2 style=\u0022width:33.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=145 colspan=8 rowspan=2 style=\u0022width:108.45pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '2', '',
       '<br/>', '3', '</span></br></p> </td>',
       '<td width=48 colspan=2 rowspan=2 style=\u0022width:36.3pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p> </td> ',
       '<td width=50 colspan=4 rowspan=2 style=\u0022width:37.65pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '8', '</span></b></p>  </td>',
       '<td width=34 colspan=3 rowspan=2 style=\u0022width:25.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=46 colspan=4 rowspan=2 style=\u0022width:34.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '6', '</span></b></p></td>',
       '<td width=46 colspan=2 rowspan=2 style=\u0022width:34.2pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '7', '</span></b></p>  </td>  ',
       '<td width=49 colspan=3 rowspan=2 style=\u0022width:36.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '4', '</span></b></p></td>',
       '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=55 colspan=3 rowspan=2 style=\u0022width:41.1pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p>  </td>',
       '<td width=51 colspan=2 rowspan=2 style=\u0022width:37.95pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '9', '</span></b></p>  </td> </tr> ',
       '<tr style=\u0022height:17.0pt\u0022>    <td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;    background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>    <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;    text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;    color:black\u0022>', '', '</span></b></p>    </td>   ',
       '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;color:black\u0022>', '', '</span></b></p></td>',
       '', '', '</tr>");
       liczenie_liczba_zmian ++;'
      );
        }else if($typ == "wyposażenie 50-200"){

          echo tabeladb2('15', 'SELECT * FROM inwentarz WHERE wartosc_ewid < 200 AND przypisane_do="'.$pracownik.'" AND zlikwidowano = "0000-00-00" ORDER BY id ASC', '', '',
         '$("#tabela_wykaz").append("<tr style=\u0022height:17.0pt\u0022><td width=44 colspan=2 rowspan=2 style=\u0022width:33.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=145 colspan=8 rowspan=2 style=\u0022width:108.45pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '2', '',
       '<br/>Nr. inw. ', '1', '</span></br></p> </td>',
       '<td width=48 colspan=2 rowspan=2 style=\u0022width:36.3pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p> </td> ',
       '<td width=50 colspan=4 rowspan=2 style=\u0022width:37.65pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p>  </td>',
       '<td width=34 colspan=3 rowspan=2 style=\u0022width:25.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=46 colspan=4 rowspan=2 style=\u0022width:34.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '5', '</span></b></p></td>',
       '<td width=46 colspan=2 rowspan=2 style=\u0022width:34.2pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '7', '</span></b></p>  </td>  ',
       '<td width=49 colspan=3 rowspan=2 style=\u0022width:36.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '6', '</span></b></p></td>',
       '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
       '<td width=55 colspan=3 rowspan=2 style=\u0022width:41.1pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p>  </td>',
       '<td width=51 colspan=2 rowspan=2 style=\u0022width:37.95pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>Cena<br/>', '10', '</span></br></p>  </td> </tr> ',
       '<tr style=\u0022height:17.0pt\u0022>    <td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;    background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>    <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;    text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;    color:black\u0022>', '', '</span></b></p>    </td>   ',
       '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;color:black\u0022>', '', '</span></b></p></td>',
       '', '', '</tr>");
       liczenie_liczba_zmian ++;'
      );
        }else if($typ == "wyposażenie 200-2000"){

          echo tabeladb2('15', 'SELECT * FROM inwentarz WHERE wartosc_ewid > 200 AND wartosc_ewid < 2000 AND przypisane_do="'.$pracownik.'" AND zlikwidowano = "0000-00-00" ORDER BY id ASC', '', '',
          '$("#tabela_wykaz").append("<tr style=\u0022height:17.0pt\u0022><td width=44 colspan=2 rowspan=2 style=\u0022width:33.0pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
        '<td width=145 colspan=8 rowspan=2 style=\u0022width:108.45pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '2', '',
        '<br/>Nr. inw. ', '1', '</span></br></p> </td>',
        '<td width=48 colspan=2 rowspan=2 style=\u0022width:36.3pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022> <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt; text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p> </td> ',
        '<td width=50 colspan=4 rowspan=2 style=\u0022width:37.65pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p>  </td>',
        '<td width=34 colspan=3 rowspan=2 style=\u0022width:25.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
        '<td width=46 colspan=4 rowspan=2 style=\u0022width:34.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '5', '</span></b></p></td>',
        '<td width=46 colspan=2 rowspan=2 style=\u0022width:34.2pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '7', '</span></b></p>  </td>  ',
        '<td width=49 colspan=3 rowspan=2 style=\u0022width:36.6pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
        '<td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '6', '</span></b></p></td>',
        '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p></td>',
        '<td width=55 colspan=3 rowspan=2 style=\u0022width:41.1pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>', '', '</span></b></p>  </td>',
        '<td width=51 colspan=2 rowspan=2 style=\u0022width:37.95pt;border-top:none;  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>  <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;  text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt\u0022>Cena<br/>', '10', '</span></br></p>  </td> </tr> ',
        '<tr style=\u0022height:17.0pt\u0022>    <td width=40 colspan=3 style=\u0022width:30.25pt;border-top:none;border-left:none;    border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;    background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022>    <p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;    text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;    color:black\u0022>', '', '</span></b></p>    </td>   ',
        '<td width=110 colspan=6 style=\u0022width:82.35pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt;height:17.0pt\u0022><p class=MsoNormal align=center style=\u0022margin-bottom:0cm;margin-bottom:.0001pt;text-align:center;line-height:normal\u0022><b><span style=\u0022font-size:7.0pt;color:black\u0022>', '', '</span></b></p></td>',
        '', '', '</tr>");
        liczenie_liczba_zmian ++;'
       );

        }


      };
      echo '
    });
});
});
var objsel = {
  "pracownik": "'.$pracownik.'",
  "typ": "'.$typ.'"
};
var objinp = {
  "jednos": "'.$jednos.'"
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
</script>
<div class="container"><textarea id="txtEditor"></textarea></div>
                  </main>

                  <script src="js/tylkosprawdzindeks.js"></script>';





/// koniec części main

} else {
    // Widok dla użytkownika niezalogowanego
    header("Location: login.php");
    die();

}

require 'includes/footer.php';
