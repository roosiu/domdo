function sprawdzindeks(id, ulica, nr_lok) {
////console.log(id, ulica, nr_lok);

    if(ulica == "700-lecia 16")
    {
        indeks_1_czesc = "01-05-001";
        ilosc_klatek = "2";
        liczba_lokali = "30";
        liczba_lokali_na_kondyg = "3;3";

    }
    else if(ulica == "700-lecia 14"){
        indeks_1_czesc = "01-05-002";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 12"){
        indeks_1_czesc = "01-05-003";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 10"){
        indeks_1_czesc = "01-05-004";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 8"){
        indeks_1_czesc = "01-05-005";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 6"){
        indeks_1_czesc = "01-05-006";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 4"){
        indeks_1_czesc = "01-05-007";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 2"){
        indeks_1_czesc = "01-05-008";
        ilosc_klatek = "3";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "3;3;4";
    }
    else if(ulica == "700-lecia 20"){
        indeks_1_czesc = "01-05-009";
        ilosc_klatek = "4";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "2;3;2;3";
    }
    else if(ulica == "700-lecia 22"){
        indeks_1_czesc = "01-05-010";
        ilosc_klatek = "4";
        liczba_lokali = "50";
        liczba_lokali_na_kondyg = "2;3;2;3";
    }
    else if(ulica == "700-lecia 18"){
        indeks_1_czesc = "01-05-030";
        ilosc_klatek = "";
        liczba_lokali = "";
    }
    else if(ulica == "Dreckiego 1"){
        indeks_1_czesc = "01-05-018";
        ilosc_klatek = "6";
        liczba_lokali = "75";
        liczba_lokali_na_kondyg = "3;2;3;2;3;2";
    }
    else if(ulica == "Dreckiego 3"){
        indeks_1_czesc = "01-05-017";
        ilosc_klatek = "4";
        liczba_lokali = "40";
        liczba_lokali_na_kondyg = "2;2;2;2";
    }
    else if(ulica == "Dreckiego 5"){
        indeks_1_czesc = "01-05-015";
        ilosc_klatek = "4";
        liczba_lokali = "45";
        liczba_lokali_na_kondyg = "2;2;3;2";
    }
    else if(ulica == "Dreckiego 7"){
        indeks_1_czesc = "01-05-016";
        ilosc_klatek = "4";
        liczba_lokali = "40";
        liczba_lokali_na_kondyg = "2;2;2;2";
    }
    else if(ulica == "Dreckiego 9"){
        indeks_1_czesc = "01-05-014";
        ilosc_klatek = "4";
        liczba_lokali = "45";
        liczba_lokali_na_kondyg = "2;2;3;2";
    }
    else if(ulica == "Dreckiego 11"){
        indeks_1_czesc = "01-05-013";
        ilosc_klatek = "6";
        liczba_lokali = "60";
        liczba_lokali_na_kondyg = "2;2;2;2;2;2";
    }
    else if(ulica == "Dreckiego 13"){
        indeks_1_czesc = "09-16-10-03";
        ilosc_klatek = "2";
        liczba_lokali = "20";
        liczba_lokali_na_kondyg = "2;2";
    }
    else if(ulica == "Dreckiego 15"){
        indeks_1_czesc = "01-05-012";
        ilosc_klatek = "2";
        liczba_lokali = "20";
        liczba_lokali_na_kondyg = "2;2";
    }
    else if(ulica == "Dreckiego 17"){
        indeks_1_czesc = "01-05-019";
        ilosc_klatek = "2";
        liczba_lokali = "20";
        liczba_lokali_na_kondyg = "2;2";
    }
    else if(ulica == "Dreckiego 19"){
        indeks_1_czesc = "01-05-031";
        ilosc_klatek = "";
        liczba_lokali = "";
    }
    else if(ulica == "Osiedle "){
        indeks_1_czesc = "01-05";
        ilosc_klatek = "65";
        liczba_lokali = "845";
    }
    else
    {
      indeks_1_czesc = "";
      ilosc_klatek = "";
        liczba_lokali = "";

    }

    if($.isNumeric(nr_lok))
    {
////// sprawdzanie umiejscowienia lokalu w budynku
        ilosc_kondygnacji = 5;
        var liczba_lokali_na_kondyg_rozdzielona = liczba_lokali_na_kondyg.split(";");
        ///////sprawdzanie ilosc lokali w klatkach oraz jakie numery wystepuja w klatkach
        var liczba_lokali_w_klatkach=[];
        var numery_lokali_w_klatkach=[];
        var pierwszy_nr_w_klatce=[];
        var rosnaca = 0;
        for (i = 0; i < liczba_lokali_na_kondyg_rozdzielona.length; ++i) {
            liczba_lokali_w_klatkach.push(liczba_lokali_na_kondyg_rozdzielona[i]*ilosc_kondygnacji); //// ile mieszkan w klatkach

            rosnaca = rosnaca + parseInt(liczba_lokali_w_klatkach[i]);

                pierwszy_nr_w_klatce.push(rosnaca);


        }

        ///console.log(numery_lokali_w_klatkach);
        ////console.log(pierwszy_nr_w_klatce);


        ///////koniec sprawdzanie ilosc lokali w klatkach oraz jakie numery wystepuja w klatkach
        /////// sprawdzanie w ktorej klatce znajduje sie lokal
        for (i = 0; i < pierwszy_nr_w_klatce.length; ++i) {
            if(pierwszy_nr_w_klatce[i-1]){
                if(nr_lok <= pierwszy_nr_w_klatce[i] && nr_lok > pierwszy_nr_w_klatce[i-1]){
                    nr_klatki = (i+1);
                }
            }else {
                nr_klatki = (i+1);
            }

        }
        ///////koniec sprawdzanie w ktorej klatce znajduje sie lokal
        //////sprawdzanie na ktorej kondygnacji znajduje sie lokal

    ///    console.log("numer lokalu: "+nr_lok);
     ///   console.log("numer klatki: "+nr_klatki);
      ////  console.log("liczba mieszkan na kondygnacji: "+liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]);
      ///  console.log("liczba mieszkan w klatce: "+liczba_lokali_w_klatkach[nr_klatki-1]);
      ///  console.log("ostatnie mieszkanie w klatce: "+pierwszy_nr_w_klatce[nr_klatki-1]);

        var x = 0;
        var przedzial;
        if(liczba_lokali_w_klatkach[nr_klatki-1] == pierwszy_nr_w_klatce[nr_klatki-1]){
            for (i = 1; i <= nr_lok; ++i) {
                i = i+parseInt(liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]-1);
               //// console.log(i);
                x = x+1;
                przedzial = i;

            }

        } else {


            for (i = pierwszy_nr_w_klatce[nr_klatki-1] - liczba_lokali_w_klatkach[nr_klatki-1]+1; i <= nr_lok; ++i) {

                i = i+parseInt(liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]-1);
               ////// console.log("na pietrze"+i);
                x = x+1;
                przedzial = i;
            }
        }
        nr_kondygnacji = x-1;
      ///  console.log("Kondygnacja: "+nr_kondygnacji);
      ///  console.log(nr_lok-przedzial);
        if(liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]==4){
           if((nr_lok-przedzial) == 0) {
            strona_mieszkania = "mieszkanie prawe"
           } else if((nr_lok-przedzial) == -1) {
            strona_mieszkania = "mieszkanie środkowe prawe"
            } else if((nr_lok-przedzial) == -2) {
            strona_mieszkania = "mieszkanie środkowe lewe"
            } else if((nr_lok-przedzial) == -3) {
            strona_mieszkania = "mieszkanie lewe"
           }
        } else if(liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]==3){
            if((nr_lok-przedzial) == 0) {
             strona_mieszkania = "mieszkanie prawe"
            } else if((nr_lok-przedzial) == -1) {
             strona_mieszkania = "mieszkanie środkowe"
             } else if((nr_lok-przedzial) == -2) {
             strona_mieszkania = "mieszkanie lewe"
            }
        } else if(liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]==2){
            if((nr_lok-przedzial) == 0) {
             strona_mieszkania = "mieszkanie prawe"
            } else if((nr_lok-przedzial) == -1) {
             strona_mieszkania = "mieszkanie lewe"
             }
        }

      ////  console.log(strona_mieszkania);
      ///  console.log("--------------");

        //////koniec sprawdzanie na ktorej kondygnacji znajduje sie lokal
        //////sprawdzanie po ktorej stronie znajduje sie lokal



        //////koniec sprawdzanie po ktorej stronie znajduje sie lokal


///////// koniec sprawdzania umiejscowianie lokalu w budynku

            dlugosc = nr_lok.length;
            if(dlugosc == 1) {
                indeks_2_czesc = "-00"+nr_lok;

            }
            else if(dlugosc == 2) {
                indeks_2_czesc = "-0"+nr_lok;
            } else {
                indeks_2_czesc = "";
            }


            return " <span class='badge badge-dark dontprint clickable pokaz_info'><i class='fa fa-info-circle' aria-hidden='true'></i></span><div id='text_info_"+id+"' class='d-none text-info'><p class='small'>Indeks: "+indeks_1_czesc+""+indeks_2_czesc+"<br/>"+nr_klatki+" klatka<br/>kondygnacja: "+nr_kondygnacji+"<br/>"+strona_mieszkania+"<br/>Ilość mieszkań na kondygnacji: "+liczba_lokali_na_kondyg_rozdzielona[nr_klatki-1]+"<br/>Mieszkania powyżej: i przekierowania na zgłoszenia<hr><span class='small'>Ogólne<br/>Ilość klatek: "+ilosc_klatek+"<br/>Ilość lokali: "+liczba_lokali+"</span></p></div>";

    } else {
        return "<span class='badge badge-dark dontprint clickable pokaz_info'><i class='fa fa-info-circle' aria-hidden='true'></i></span><div id='text_info_"+id+"' class='d-none text-info'><p class='small'>Ogólne<br/>Indeks: "+indeks_1_czesc+"<br/>Ilość klatek: "+ilosc_klatek+"<br/>Ilość lokali: "+liczba_lokali+"</p></div>";
    }

}
