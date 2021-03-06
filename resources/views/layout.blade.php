<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


    <title>Cosmiatría</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<!-- Jquery -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Datepicker Files -->
  <link rel="stylesheet" href="asset/datePicker/css/bootstrap-datepicker3.css">
  <link rel="stylesheet" href="asset/datePicker/css/bootstrap-datepicker3.standalone.css">
  <script src="asset/datePicker/js/bootstrap-datepicker.js"></script>
  <!-- Languaje -->
  <script src="asset/datePicker/locales/bootstrap-datepicker.es.min.js"></script>

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{URL::asset('/')}}">Cosmiatría</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{URL::asset('/')}}">Inicio</a></li>
                <li class="{{ Request::is('servicios') ? 'active' : '' }}"><a href="{{URL::asset('/servicios')}}">Sercivios</a></li>
                <li class="{{ Request::is('preguntas') ? 'active' : '' }}"><a href="{{URL::asset('/preguntas')}}">Preguntas Frecuentes</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li class="{{ Request::is('login') ? 'active' : '' }}" ><a href="{{URL::asset('/admin')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                  <li><a ><span class=""></span> </a></li>

              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>

  <div class="container">
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        @yield('carrusel')
    </div>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        @yield('contenido')
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      @yield('servicios')

      <!-- /END THE FEATURETTES -->
      <br>
      <div class="col-lg-4">
          @yield('contacto')
      </div>

      <div class="col-lg-4">
        @yield('mapa')
      </div>


    </div><!-- /.container -->
    <!-- FOOTER -->

    <footer>
      <p class="pull-right"><a href="#">Back to top</a></p>
      <p>&copy; 2016 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
  </div>
  <embed id=sonido src="{{URL::asset('storage/melodia.mp3')}}" autostart=true loop=true width=0 height=0>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <!--script src="../../dist/js/bootstrap.min.js"></script-->
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
