@if(isset($cita))

      <div class="container">
        <div class="row">
            <div class='col-sm-10'>
                <div class="form-group">
                    <div class='input-group'>
                        {{$cita->nombre}}
                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group '>
                        <input type="email" class="contact-input" name="mail" id="mail" value={{$cita->mail}} />
                    </div>
                </div>
            </div>
        </div>
    </div>

            <div class="container">
              <div class="row">
                  <div class='col-sm-6'>
                      <div class="form-group">
                          <div class='input-group date' id='datetimepicker1'>
                            <select class="form-control" name="servicio" value={{$cita->servicio}}>
                                 @foreach ($servicios as $servicio)
                                 @if($cita->servicio == $servicio->nombre)
                                     <option selected>{{ $servicio->nombre }}</option>
                                 @else
                                     <option>{{ $servicio->nombre }}</option>
                                 @endif

                                 @endforeach
                             </select>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

             <div class="container">
               <div class="row">
                   <div class='col-sm-6'>
                       <div class="form-group">
                           <div class='input-group date'>
                             <select class="form-control" name="hora">
                                  @foreach ($hora as $h)
                                    @if($cita->hora == $h->hora)
                                        <option selected>{{ $h->hora}}</option>
                                    @else
                                        <option>{{ $h->hora}}</option>
                                    @endif
                                  @endforeach
                              </select>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <input type="text" class="form-control input-medium bfh-phone" name="telefono" id="telefono" placeholder="Teléfono*" data-format="+1 (ddd) ddd-dddd"
                    value={{ $cita->numero}} />
           <br>
           <div class="container">
             <div class="row">
                 <div class='col-sm-2'>
                     <div class="form-group">
                         <div class='input-group date' id='datetimepicker1'>
                             <input type="text" class="form-control datepicker" name="date" value={{$cita->fecha}}>
                             <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                             </span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

@else
<div class="panel panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">¡No esperes más!</h3>
      <p>Solicita tú cita de manera muy rápida y facil</p>
    </div>
      <form method="POST" action="CrearCita">
     {!! csrf_field()!!}


        <div class="panel-body">

            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre completo*"  value="{{ old('nombre')}}" />
            <br>
            <input type="email" class="form-control" name="mail" id="mail" placeholder="Email*" value="{{ old('mail')}}"  />
            <br>
            <input type="text" class="form-control input-medium bfh-phone" data-country="US" name="telefono" id="telefono"
                placeholder="Teléfono*"  value="{{ old('telefono')}}" />
            <br>
            <select class="form-control" name="servicio" required >
              <option value="" disabled selected>Selecciona Servicio* </option>
              @foreach ($servicios as $servicio)
              <option>{{ $servicio->nombre}}</option>
              @endforeach
            </select>
            <br>
            <select class="form-control" name="hora" required >
              <option value="" disabled selected>Selecciona hora* </option>
              @foreach ($hora as $h)
              <option>{{ $h->hora}}</option>
              @endforeach
            </select>
            <br>
            <div class='input-group date' id='datetimepicker1'>
              <input type="text" class="form-control datepicker" name="date" placeholder="Fecha" value={{old('date')}} >
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <br>
            <span class="help-block">Todo los campos son obligatorios</span>
            <button type="submit" class="btn btn-default">Registrar</button>
          </from>
          <br>
    </div>
</div>

@endif

<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true,
        inline: true
    });
</script>
