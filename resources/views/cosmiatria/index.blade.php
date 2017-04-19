@extends('layout')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
@section('carrusel')

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <img class="first-slide" src="{{URL::asset('storage/' . $promocion->shift()->imagen)}}" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
    @foreach ($promocion as $promocion)
    <div class="item">
      <img class="third-slide" src="{{URL::asset('storage/' . $promocion->imagen)}}" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
          <p><a class="btn btn-lg btn-primary" href="{{URL::asset('/servicios')}}" role="button">Servicios</a></p>
        </div>
      </div>
    </div>
@endforeach
  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
@endsection

@section('contacto')
  @include('cosmiatria.contacto')
@endsection

@section('mapa')
<div class="container">
 <div class="row">
   <div class="col-md-7">
     <div class="panel panel-success">
       <div class="panel-heading">Contacto</div>

        <div class="panel-body">
         <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6600">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <iframe id="ytplayer" type="text/html" width="800" height="350" src="{{URL::asset('storage/vide.gif')}}" frameborder="0" allowfullscreen=""></iframe>
                <div class="container">
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>
              <div class="item">
                <iframe width="800" height="350" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.743817684701!2d-98.16711548558072!3d19.074997987088494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc1bce5a7ada3%3A0x8435d1368799857e!2sEstadio+de+B%C3%A9isbol+Hermanos+Serd%C3%A1n!5e0!3m2!1ses-419!2smx!4v1492578857108" frameborder="0" allowfullscreen=""></iframe>
                <div class="container">
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- /.carousel -->
@endsection
