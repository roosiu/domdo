/////// funkcja usuwania wpisu
    function deleteRecord(id, tabela) {


        $.ajax({
            type:"post",
            url:"includes/delete.php",
            data: {"delete" : id,
                "tabela" : tabela},
                encode : true,
            success:function(data){

               if(data == "ok"){
                $('<div></div>').dialog({
                    modal: true,
                    title: "Informacja",
                    open: function () {
                        var markup = 'Wpis został usunięty z bazy danych';
                        $(this).html(markup);
                    },
                    buttons: {
                        Ok: function () {
                            $(this).dialog("close");
                        }
                    }
                }); //end confirm dialog

                $("#dialog-confirm-"+id).dialog( "close" );
                $("#"+id).parent("td").parent("tr").remove();
               }else{
                alert(data);
               }

            },
            error: function(data) {
                alert("Błąd: "+data);

             },
        })
    }

///////////// funkcja tworzenia wpisu
    function createRecord(nowe, tabela) {


       var select_all, value_all, zapytanie;

       $.each(nowe, function( select, value ) {
            $(function() {
                if(select_all == null) {
                    select_all = select;
                    value_all = "'"+value +"'";
                } else {
                    if(value != null){

                    select_all = select_all +", "+ select;
                    value_all = value_all +", '"+ value +"'";
                }
                }
            });
        });

    zapytanie = "INSERT INTO "+tabela+" ("+select_all+")  VALUES  ("+value_all+")";



        $.ajax({
            type:"post",
            url:"includes/create.php",
            data: {"nowy" : zapytanie},
            encode : true,
            success:function(data){

               if(data == "ok"){
                $('<div></div>').dialog({
                    modal: true,
                    title: "Informacja",
                    open: function () {
                        var markup = 'Wpis został zapisany';
                        $(this).html(markup);
                    },
                    buttons: {
                        Ok: function () {
                            history.back(1);
                            $(this).dialog("close");
                        }
                    }
                }); //end confirm dialog



               }else{
                alert(data);
               }

            },
            error: function(data) {
                alert("Błąd: "+data);

             },
        })
    }
///////////// funkcja aktualizacji wpisu
    function updateRecord(id, nowe, tabela) {


       var val_all, zapytanie;

       $.each(nowe, function( select, value ) {
            $(function() {
                if(val_all == null) {

                    val_all = select+" = '"+value+"'";
                } else {
                    if(value != null){
                    val_all = val_all +", "+ select+" = '"+value+"'";
                }
                }
            });
        });

    zapytanie = "UPDATE "+tabela+" SET "+val_all+"  WHERE id="+id;


        $.ajax({
            type:"post",
            url:"includes/create.php",
            data: {"nowy" : zapytanie},
            encode : true,
            success:function(data){

               if(data == "ok"){
                $('<div></div>').dialog({
                    modal: true,
                    title: "Informacja",
                    open: function () {
                        var markup = 'Wpis został zaktualizowany';
                        $(this).html(markup);
                    },
                    buttons: {
                        Ok: function () {
                            $(this).dialog("close");
                        }
                    }
                }); //end confirm dialog



               }else{
                alert(data);
               }

            },
            error: function(data) {
                alert("Błąd: "+data);

             },
        })
    }
///////////// funkcja aktualizacji wpisów po nazwie bez komunikatu
    function UpdateMailOpt(name, wartosc, tabela) {


       var zapytanie;

   /////    UPDATE `ustawienia_adresy_mail` SET `mail`='andrzej.kaszewski@ksmino.pl' WHERE `nazwa` = 'zgl_unifony'

    zapytanie = "UPDATE `"+tabela+"` SET `mail` = '"+wartosc+"'  WHERE `nazwa`='"+name+"'";


        $.ajax({
            type:"post",
            url:"includes/create.php",
            data: {"nowy" : zapytanie},
            encode : true,
            success:function(data){

               if(data == "ok"){


               }else{
                alert(data);
               }

            },
            error: function(data) {
                alert("Błąd: "+data);

             },
        })
    }

///////////// funkcja tworzenia multiwpisu
    function createRecordnotConfirm(nowe, tabela) {


       var select_all, value_all, zapytanie;

       $.each(nowe, function( select, value ) {
            $(function() {
                if(select_all == null) {
                    select_all = select;
                    value_all = "'"+value +"'";
                } else {
                    if(value != null){

                    select_all = select_all +", "+ select;
                    value_all = value_all +", '"+ value +"'";
                }
                }
            });
        });

    zapytanie = "INSERT INTO "+tabela+" ("+select_all+")  VALUES  ("+value_all+")";



        $.ajax({
            type:"post",
            url:"includes/create.php",
            data: {"nowy" : zapytanie},
            encode : true,
            success:function(data){

               if(data == "ok"){



               }else{
                alert(data);
               }

            },
            error: function(data) {
                alert("Błąd: "+data);

             },
        })
    }
