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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/dataTables.bootstrap.min.css" >

<link rel="stylesshet" href="{{ asset('css/app.cs')}}">
<!-- Datepicker Files -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="../asset/datePicker/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="../asset/datePicker/css/bootstrap-datepicker3.standalone.css">
<script src="../asset/datePicker/js/bootstrap-datepicker.js"></script>
<script src="../asset/datePicker/locales/bootstrap-datepicker.es.min.js"></script>
<!-- Datepicker Files -->

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{URL::asset('admin')}}">Admin Cosmiatría</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{URL::asset('admin')}}">Inicio</a></li>
            <li class="{{ Request::is('admin/servicios') ? 'active' : '' }}"><a href="{{URL::asset('admin/servicios')}}">Servicio</a></li>
            <li class="{{ Request::is('admin/pregunta') ? 'active' : '' }}"><a href="{{URL::asset('admin/pregunta')}}">Preguntas Frecuentes</a></li>
            <li class="{{ Request::is('admin/promocion') ? 'active' : '' }}"><a href="{{URL::asset('admin/promocion')}}">Promociones</a></li>
            <li class="glyphicon glyphicon-cog"><a href="#" target="_blank" title="Facebook"></a></li>
            <li><a href="{{route('logout')}}">Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="page-header">
      </div>
      @if(Session::has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
      </div>
      @endif


        @yield('contenido')


      <div class="page-header">
        @yield('tabla')
      </div>



    </div> <!-- /container -->



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>




  </body>
  <script >
  $(document).ready(function(){
      $('#tablaCitas').DataTable();
  });
  </script>


</html>
