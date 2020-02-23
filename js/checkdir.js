$(window).on("load", function() {
    $("table:first tr").each(function(){
      var id_do_spr_dir = $(this).find("button:last").attr("id");
     var td_do_dodania_ikony = $(this).find("td:eq(4)");
      if($.isNumeric(id_do_spr_dir))
        {
          $.post( "uploads/checkdir.php", { dir: id_do_spr_dir })
          .done(function( data ) {
            if(data){

              td_do_dodania_ikony.append(" <i class='fa fa-paperclip' aria-hidden='true'></i>");

            };
          });
        }
      });

  });