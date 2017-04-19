@extends('admin.layoutAdmin')
@section('contenido')
<a href="nServicio" class="btn btn-success" role="button">Crear servicio</a>

@endsection
@section('tabla')

 <h2>Servicios</h2>
 <table class="table table-hover">
    <thead>
        <tr class="danger">
            <td >Id</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Imagen</td>
            <td></td>
        </tr>
    </thead>
    <tbody>

  @foreach($servicios as $servicios)
    <tr>
      <td>  {{$servicios->id}} </td>
      <td>  {{$servicios->nombre}} </td>
      <td>  {{$servicios->descripcion}} </td>
      <td>  {{$servicios->imagen}} </td>
      <td>
        <a href="{!! URL::to('/edit/'.$servicios->id) !!}">Editar</a>
                  <br>
        <a href="{!! URL::to('/eliminar/'.$servicios->id) !!}">Eliminar</a>
      </td>
    </tr>
    </tbody>
  @endforeach
  </table>

@endsection
