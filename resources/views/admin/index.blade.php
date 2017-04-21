@extends('admin.layoutAdmin')
@section('contenido')
<h2>Citas</h2>
<div class="contanier">
<table  class="table" id="citas">
    <thead>
          <tr class="danger">

              <td>Nombre</td>
              <td>Hora</td>
              <td>Fecha</td>
                <td>Servicio</td>
              <td>Correo</td>
              <td >Telefono</td>
              <td>Accción </td>
          </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
        @if($cita->atendido == false)
          <tr>
            <td>  {{$cita->nombre}} </td>
            <td>  {{$cita->hora}} </td>
            <td>  {{$cita->fecha}} </td>
            <td>  {{$cita->servicio}} </td>
            <td>  {{$cita->mail}} </td>
            <td>  {{$cita->numero}} </td>

            <td>
              <a href="{!! URL::to('/actualizarCita/'.$cita->id) !!}" class="btn btn-warning btn-primary btn-sm btn-block"
                role="button">Reagendar</a>
              <a href="{!! URL::to('/eliminarCita/'.$cita->id) !!}" class="btn btn-danger btn-primary btn-sm btn-block"
                role="button">Eliminar</a>

                  @if($cita->estatus == false)
                    <a href="{!! URL::to('/citaConfirmar/'.$cita->id) !!}"
                      class="btn btn-success btn-primary btn-sm btn-block "
                      role="button">Confirmar</a>
                  @else
                    <a href="{!! URL::to('/atendido/'.$cita->id) !!}"
                      class="btn btn-info btn-primary btn-sm btn-block "
                      role="button">Atendido</a>

                  @endif

              </td>
          </tr>
          @endif
        @endforeach
    </tbody>
  </table>
</div>
@endsection
