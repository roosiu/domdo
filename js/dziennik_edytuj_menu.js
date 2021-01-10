let tresc_z = document.getElementById("tresc_z");
let menu_szablony = document.getElementById("menu_szablony");
let miejsce_implementacji_menu = document.getElementById("div_tresc_z");
///////sprawdzanie czy jest textarea name
if (tresc_z) {
    tresc_z.onfocus = function() {
      menu_szablony.style.display = "block";
      miejsce_implementacji_menu.appendChild(menu_szablony);
      menu_szablony.style.width = "100%";
    };
    tresc_z.onblur = function() {
      menu_szablony.style.display = "none";
    };
  } else {
    document.body.focus();
  }

  tresc_z.onkeydown = function() {
    menu_szablony.style.display = "none";
    tresc_z.onmousedown = function() {
      menu_szablony.style.display = "block";
    };
  };

  ///// wywołanie menu
$(function() {
    $("#menu_szablony").menu();
  });

  /////jeśli kliknięcie w menu to dodaje do textarea
function wprowdzTekst(event) {
    var target = event.target || event.srcElement;

    var cursorPos = $("#tresc_z").prop("selectionStart");
    var dodatek = "";
    var v = $("#tresc_z").val();
    var textBefore = v.substring(0, cursorPos);
    var textAfter = v.substring(cursorPos, v.length);
    if (textBefore) {
      dodatek = " , ";
    }
    $("#tresc_z").val(textBefore + dodatek + event.target.innerHTML + textAfter);
  }
