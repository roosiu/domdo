function tylkosprawdzindeks(ulica, nr_lok) {
    if(ulica == "700-lecia 16")
    {
        indeks_1_czesc = "01-05-001";

    }
    else if(ulica == "700-lecia 14"){
        indeks_1_czesc = "01-05-002";
    }
    else if(ulica == "700-lecia 12"){
        indeks_1_czesc = "01-05-003";
    }
    else if(ulica == "700-lecia 10"){
        indeks_1_czesc = "01-05-004";
    }
    else if(ulica == "700-lecia 8"){
        indeks_1_czesc = "01-05-005";
    }
    else if(ulica == "700-lecia 6"){
        indeks_1_czesc = "01-05-006";
    }
    else if(ulica == "700-lecia 4"){
        indeks_1_czesc = "01-05-007";
    }
    else if(ulica == "700-lecia 2"){
        indeks_1_czesc = "01-05-008";
    }
    else if(ulica == "700-lecia 20"){
        indeks_1_czesc = "01-05-009";
    }
    else if(ulica == "700-lecia 22"){
        indeks_1_czesc = "01-05-010";
    }
    else if(ulica == "700-lecia 18"){
        indeks_1_czesc = "01-05-030";
    }
    else if(ulica == "Dreckiego 1"){
        indeks_1_czesc = "01-05-018";
    }
    else if(ulica == "Dreckiego 3"){
        indeks_1_czesc = "01-05-017";
    }
    else if(ulica == "Dreckiego 5"){
        indeks_1_czesc = "01-05-015";
    }
    else if(ulica == "Dreckiego 7"){
        indeks_1_czesc = "01-05-016";
    }
    else if(ulica == "Dreckiego 9"){
        indeks_1_czesc = "01-05-014";
    }
    else if(ulica == "Dreckiego 11"){
        indeks_1_czesc = "01-05-013";
    }
    else if(ulica == "Dreckiego 13"){
        indeks_1_czesc = "09-16-10-03";
    }
    else if(ulica == "Dreckiego 15"){
        indeks_1_czesc = "01-05-012";
    }
    else if(ulica == "Dreckiego 17"){
        indeks_1_czesc = "01-05-019";
    }
    else if(ulica == "Dreckiego 19"){
        indeks_1_czesc = "01-05-031";
    }
    else if(ulica == "Osiedle "){
        indeks_1_czesc = "01-05";
    }
    else
    {
      indeks_1_czesc = "";

    }

    if($.isNumeric(nr_lok))
    {
///////// koniec sprawdzania umiejscowianie lokalu w budynku
dlugosc = nr_lok.length;
///////console.log(nr_lok.slice(0, -1));
            if(dlugosc == 1) {
                indeks_2_czesc = "-00"+nr_lok;

            }
            else if(dlugosc == 2) {
                indeks_2_czesc = "-0"+nr_lok;
            } else {
                indeks_2_czesc = "";
            }


            return indeks_1_czesc+""+indeks_2_czesc;

        } else {
            return indeks_1_czesc;
        }
}