$(window).on("load", function() {
function filename(path){
    path = path.substring(path.lastIndexOf("/")+ 1);
    return (path.match(/[^.]+(\.[^?#]+)?/) || [])[0].slice(0,-4);
    }
    $(".nav-item").removeClass('active');
    if (filename(window.location.pathname)=="pracownicy_lista" || filename(window.location.pathname)=="pracownicy_lista_edytuj" || filename(window.location.pathname)=="pracownicy_kontrola_czasu" || filename(window.location.pathname)=="pracownicy_kontrola_czasu_edytuj" || filename(window.location.pathname)=="karty_odziezowe" || filename(window.location.pathname)=="karty_odziezowe_edytuj" || filename(window.location.pathname)=="napoje"|| filename(window.location.pathname)=="napoje_edytuj"){
      $(".menu_pracownicy").addClass('active');
    }else if(filename(window.location.pathname)=="dziennik" || filename(window.location.pathname)=="dziennik_edytuj"){
      $(".menu_dziennik").addClass('active');
    }
    else if(filename(window.location.pathname)=="index"){
      $(".menu_index").addClass('active');
    }else if(filename(window.location.pathname)=="faktury" || filename(window.location.pathname)=="faktury_edytuj"){
      $(".menu_inwentarz").addClass('active');
    }
    else if(filename(window.location.pathname)=="kontakty" || filename(window.location.pathname)=="kontakty_edytuj"){
      $(".menu_kontakty").addClass('active');
    }
});