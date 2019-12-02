<?php
/*
   +----------------------------------------------------------------------+
   | Sobak User System 2                                                  |
   +----------------------------------------------------------------------+
   | www.forumweb.pl/a/b/487677                                           |
   +----------------------------------------------------------------------+
   | Ten plik jest częścią skryptu Sobak User System 2 <sobak.pl>         |
   | Integrowanie w treść tego komentarza stanowi naruszenie zasad, na    |
   | których udostępniono kod.                                            |
   +----------------------------------------------------------------------+
*/

$config['db_host'] = 'localhost'; // Serwer bazy danych
$config['db_user'] = 'nadnaturalnie_dd'; // Nazwa użytkownika
$config['db_pass'] = 'domdo96'; // Hasło
$config['db_name'] = 'nadnaturalnie_dd'; // Nazwa bazy danych


// Kodu znajdującego się poniżej prawdopodobnie nie powinieneś dotykać
$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$db->set_charset("utf8");
if ($db->errno) {
    die ('<p class="error">Nie udało się połączyć z bazą danych.</p>');
}

session_start();

require 'password.php';
require 'User.php';

$user = new User($db);

$klucz_szyfrujacy = '1234567890654321';


function zakodowanie($odkodowane) {
    global $klucz_szyfrujacy;
    return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $klucz_szyfrujacy, $odkodowane, MCRYPT_MODE_ECB));
}


function odkodowanie($zakodowane) {
    global $klucz_szyfrujacy;
    return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $klucz_szyfrujacy, base64_decode($zakodowane), MCRYPT_MODE_ECB );
}

function tabeladb($od, $do, $tabela, $kod_poczatek, $kod_koniec, $kod_przed, $kod_po)
    {
        global $db;
        $query = "SELECT * FROM $tabela ORDER BY `id` ASC";

        if ($result = $db->query($query)) {

            /* fetch object array */
            while ($row = $result->fetch_row()) {

                $kod_caly = $kod_caly.$kod_poczatek;
                for ($x = $od; $x <= $do; $x++) {
                    $kod_caly = $kod_caly.$kod_przed;
                    $kod_caly = $kod_caly.$row[$x];
                    $kod_caly= $kod_caly.$kod_po;

                }
                $kod_caly = $kod_caly.$kod_koniec;

            }
        return $kod_caly;
            /* free result set */
            $result->close();
        }

    }

function tabeladb2($ile, $zapytanie_mysql, $kod_poczatek, $kod_koniec, $kod_przed_0, $odczyt_0, $kod_po_0, $kod_przed_1, $odczyt_1, $kod_po_1, $kod_przed_2, $odczyt_2, $kod_po_2, $kod_przed_3, $odczyt_3, $kod_po_3, $kod_przed_4, $odczyt_4, $kod_po_4, $kod_przed_5, $odczyt_5, $kod_po_5, $kod_przed_6, $odczyt_6, $kod_po_6, $kod_przed_7, $odczyt_7, $kod_po_7, $kod_przed_8, $odczyt_8, $kod_po_8, $kod_przed_9, $odczyt_9, $kod_po_9, $kod_przed_10, $odczyt_10, $kod_po_10, $kod_przed_11, $odczyt_11, $kod_po_11, $kod_przed_12, $odczyt_12, $kod_po_12)
    {
        global $db;
        $query = $zapytanie_mysql;

        if ($result = $db->query($query)) {

            /* fetch object array */
            while ($row = $result->fetch_row()) {

                $kod_caly =$kod_caly.$kod_poczatek;
                for ($x = 0; $x <= $ile; $x++) {
                    $$zmienna_odczyt = "odczyt_" . $x;
                    $odczyt = ${$$zmienna_odczyt};
                    $$zmienna_kod_przed = "kod_przed_" . $x;
                    $kod_przed = ${$$zmienna_kod_przed};
                    $$zmienna_kod_po = "kod_po_" . $x;
                    $kod_po = ${$$zmienna_kod_po};

                    $kod_caly = $kod_caly.$kod_przed;

                    $kod_caly = $kod_caly.$row[$odczyt];

                    $kod_caly = $kod_caly.$kod_po;

                }
                $kod_caly = $kod_caly.$kod_koniec;
            }
            return $kod_caly;

            /* free result set */
            $result->close();
        }

    }
