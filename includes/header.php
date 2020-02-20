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
<div class="box-preloader">
  <div class="loading"></div>
</div>


  <script>
  $(window).on('load', function() {
  $('.box-preloader').fadeOut();
});
  </script>

  <style>
  .box-preloader{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: white;
        z-index: 9999;
    }
.loading {
   position: absolute;
   left: 50%;
   top: 50%;
   height:60px;
   width:60px;
   margin:0px auto;
   -webkit-animation: rotation .6s infinite linear;
   -moz-animation: rotation .6s infinite linear;
   -o-animation: rotation .6s infinite linear;
   animation: rotation .6s infinite linear;
   border-left:6px solid rgba(0,174,239,.15);
   border-right:6px solid rgba(0,174,239,.15);
   border-bottom:6px solid rgba(0,174,239,.15);
   border-top:6px solid rgba(0,174,239,.8);
   border-radius:100%;
}

@-webkit-keyframes rotation {
   from {-webkit-transform: rotate(0deg);}
   to {-webkit-transform: rotate(359deg);}
}
@-moz-keyframes rotation {
   from {-moz-transform: rotate(0deg);}
   to {-moz-transform: rotate(359deg);}
}
@-o-keyframes rotation {
   from {-o-transform: rotate(0deg);}
   to {-o-transform: rotate(359deg);}
}
@keyframes rotation {
   from {transform: rotate(0deg);}
   to {transform: rotate(359deg);}
}
  </style>