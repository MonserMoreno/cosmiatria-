@extends('layout')
@section('servicios')

<?php $i = 0; ?>
@foreach ($servicios as $servicios)
 <?php $image =  $servicios->imagen;?>
 <?php $public_path = public_path();?>
 <?php $url = $public_path.'/storage/'.$image;?>
  @if($i%2==0)
    <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">{{ $servicios->nombre}} <span class="text-muted"></span></h2>
          <p class="lead">{{$servicios->descripcion}}</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="{{URL::asset('storage/' . $servicios->imagen)}}" alt={{$url}}>
        </div>
      </div>


@else
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">{{ $servicios->nombre}} <span class="text-muted"></span></h2>
          <p class="lead">{{ $servicios->descripcion}}</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img src="{{URL::asset('storage/' . $servicios->imagen)}}" alt="{{$url}}" class="img-responsive" >
        </div>
      </div>

@endif
<?php $i++; ?>
<hr class="featurette-divider">
@endforeach



@endsection
