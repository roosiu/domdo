/////// funkcja usuwania wpisu
    function deleteRecord(id, tabela) {


        $.ajax({
            type:"post",
            url:"includes/delete.php",
            data: {"delete" : id,
                "tabela" : tabela},
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
        console.log(zapytanie);


        $.ajax({
            type:"post",
            url:"includes/create.php",
            data: {"nowy" : zapytanie,
                "tabela" : tabela},
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