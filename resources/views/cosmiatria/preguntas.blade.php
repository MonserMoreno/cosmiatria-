@extends('layout')
@section('servicios')
<script languaje="javacript">
	function MostrarTodo(texto){
		var elemento = document.getElementById('texto_original');
		elemento.innertHTML = texto;
    alert ("aa");
	}
</script>

<?php $i = 0; ?>

@foreach ($preguntas as $pregunta)
<?php $txt = $pregunta->respuesta; ?>
  @if($i%2==0)

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">{{ $pregunta->pregunta}} <span class="text-muted"></span></h2>

           <p id= "texto_original">{{substr($pregunta->respuesta, 0, 15)}} <a href="javascript:void(0);" onclik="MostrarTodo('aaa')"> Ver mas </a></p>

        </div>
        <div class="col-md-5">
          <img src="" alt="" class="img-responsive" >
        </div>
      </div>


@else
      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">{{ $pregunta->respuesta}} <span class="text-muted"></span></h2>
          <p class="lead">{{ $pregunta->respuesta}}</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img src="" alt="" class="img-responsive" >
        </div>
      </div>

@endif
<?php $i++; ?>
<hr class="featurette-divider">
@endforeach



@endsection
