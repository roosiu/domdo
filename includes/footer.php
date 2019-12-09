<footer id="footer">

</footer>

    <!-- Javascript -->
    <script>
      $("#datepicker-10, #datepicker, .datepicker").datepicker({
         closeText: "Zamknij",
    prevText: "&#x3C;Poprzedni",
    nextText: "Następny&#x3E;",
    currentText: "Dziś",
    monthNames: [ "Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec",
    "Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień" ],
    monthNamesShort: [ "Sty","Lu","Mar","Kw","Maj","Cze",
    "Lip","Sie","Wrz","Pa","Lis","Gru" ],
    dayNames: [ "Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota" ],
    dayNamesShort: [ "Nie","Pn","Wt","Śr","Czw","Pt","So" ],
    dayNamesMin: [ "N","Pn","Wt","Śr","Cz","Pt","So" ],
    weekHeader: "Tydz",
    dateFormat: "yy-mm-dd",
    firstDay: 1
})
         $(function() {
            $( "#datepicker-10" ).datepicker();
            $( "#datepicker-10" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
           /// $( "#datepicker-10" ).datepicker("setDate", "-10w+1");
         });
         $(function() {
            $( ".datepicker" ).datepicker();
            $( ".datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
           /// $( "#datepicker-10" ).datepicker("setDate", "-10w+1");
         });
         $(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
           /// $( "#datepicker" ).datepicker("setDate", "today");
         });
      </script>
<!--koniec wczytywanie bibliotek-->

</body>
</html>