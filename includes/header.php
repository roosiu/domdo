<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>domdo</title>
    <!--wczytywanie css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <link href = "css/print.css" rel = "stylesheet" media = "print">
    <link href="uploader/uploadfile.css" rel="stylesheet">
    <link href="css/ekko-lightbox.css" rel="stylesheet">
<!--wczytywanie bibliotekd-->


<script src = "js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
      <script src = "js/jquery-ui.js"></script>
      <script src = "js/record.js"></script>

</head>
<body>
<!--preloader DO ZROBIENIA !!!!!!!!!!!!!!-->
<div id="mdb-preloader" class="d-flex justify-content-center">
    <div class="spinner-border" role="status">
      <span class="sr-only">Ładowanie...</span>
    </div>
  </div>
  <script>
  $(window).on('load', function() {
  $('#mdb-preloader').addClass('loaded');
});
  </script>
  <style>
  #mdb-preloader.loaded {
  opacity: 0;
  transition: .3s ease-in 1s;
}
  </style>