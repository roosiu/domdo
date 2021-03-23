function hiderow(table_name, colnb) {
    "load resize".split(" ").forEach(function(e){
    window.addEventListener(e, function(event) {
        ////console.log(document.body.clientWidth + ' wide by ' + document.body.clientHeight+' high');
        if(document.body.clientWidth > 768)
            {///console.log("wieksze");

                for (i = 0; i < colnb.length; i++) {

                        show_hide_column(table_name, colnb[i], true);
                }
            }
        else
            {///console.log("mniejsze");
                for (i = 0; i < colnb.length; i++) {

                    show_hide_column(table_name, colnb[i], false);
                }
                ////console.log(document.getElementsByTagName("table").rows[0].innerHTML); //// do poprawki
            }
    })
     });
}

function show_hide_column(table_name, col_no, do_show) {
    var rows = document.getElementById(table_name).rows;

    for (var row = 0; row < rows.length; row++) {
        var cols = rows[row].cells;
        if (col_no >= 0 && col_no < cols.length) {
            cols[col_no].style.display = do_show ? '' : 'none';
        }
    }
}