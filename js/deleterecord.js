
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
