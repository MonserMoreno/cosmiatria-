<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\citas;
use App\servicios;
use App\preguntas;
use Mail;
use Session;
use Redirect;
use Illuminate\Mail\Message;
use App\Hora;
use App\promocion;
use App\clientes;

class AdminController extends Controller
{

    public function index()
    {
      $citas = citas::all();
      return view('admin.index',compact('citas'));
      //return 'principal';
    }


    public function create()
    {
        //
    }

    public function confirmarcion($id){
      $cita = citas::findOrFail($id);
      Mail::send('emails.confirmacion',compact('cita'), function (Message $message) use($cita){
        $message ->to($cita->mail,$cita->nombre)
            ->from('laravelsokdesa@gmail.com','Cosmiatria Company')
            ->subject('Confirmación Cita');
      });;

      $a = clientes::where('nombre','=',$cita->nombre)
                    ->Where('mail','=',$cita->mail)
                    ->first();

      if(is_null($a)){
        //echo "pong";
        clientes::create([
          'nombre'=>$cita->nombre,
          'mail'=>$cita->mail,
          'numero' => $cita->numero,
        ]);
      }

      $cita->estatus = true;
      $cita->save();
      return redirect()->to('admin')->with('message','Correo enviado!');

    }


    public function atendido($id){
      $cita = citas::findOrFail($id);
    /*  Mail::send('emails.confirmacion',compact('cita'), function (Message $message) use($cita){
        $message ->to($cita->mail,$cita->nombre)
            ->from('laravelsokdesa@gmail.com','Cosmiatria Company')
            ->subject('Confirmación Cita');
      });;*/

      $a = clientes::where('nombre','=',$cita->nombre)
                    ->Where('mail','=',$cita->mail)
                    ->first();



        $num = $a->citas;
        $cliente = clientes::find($a->id);
        $cliente->citas = $num+1;
        $cliente->save();

      $cita->atendido = true;
      $cita->save();
      return redirect()->to('admin')->with('message','Almacenado!');

    }

    public function store(Request $request)
    {
        //obtenemos el archivo del formulario
         $file = $request->file('file');
        //obtenemos el nombre
         $nombre = $file->getClientOriginalName();
         //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
        servicios::create([
          'nombre'=>$request['nombre'],
          'descripcion'=>$request['descripcion'],
          'imagen' => $nombre,
        ]);
        return redirect()->to('admin/nServicio')->with('message','Servicio creado');
    }

    public function nuevaP(Request $request)
    {
        preguntas::create([
          'pregunta'=>$request['pregunta'],
          'respuesta'=>$request['respuesta'],
        ]);
        return redirect()->to('admin/nPregunta')->with('message','Pregunta creada');
    }

    public function vista()
    {
      $servicios = servicios::all();
      //return view('usuarios/principal',compact('usuarios'));
      return view('admin.servicio', compact('servicios'));
    }

    public function vistapromocion()
    {
      $promocion = promocion::all();
      return view('admin.promocion',compact('promocion'));
    }


    public function vistaP()
    {
      $preguntas = preguntas::all();
      return view('admin.pregunta',compact('preguntas'));
    }

    public function vistaNS()
    {
      return view('admin.nServicio');
    }

    public function vLogin()
    {
      return view('admin.login');
    }

    public function vistaNP()
    {
      return view('admin.nPregunta');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
      $servicio = servicios::find($id);
      return view('admin.edit',['servicio'=>$servicio]);
    }


    public function update(Request $request, $id)
    {
      $serv = servicios::find($id);
     $serv->nombre     = $request->nombre;
     $serv->descripcion    = $request->descripcion;
     if($request->file != "")
     {
       $imag = $request->file;
       $nombre = $imag->getClientOriginalName();
       \Storage::disk('local')->put($nombre,  \File::get($imag));
       $serv->imagen        =$nombre;
      }
       $serv->save();
     //Session::flash('message','Servicio Actualizado Correctamente');
     //return redirect()->to('admin.servicios');
     return redirect()->to('admin/servicios')->with('message','Servicio actualizado');
    // echo($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try{
         $user = servicios::findOrFail($id);
         $user->delete();
         return redirect()->to('admin/servicios')->with('message','Servicio eliminado');;
     } catch (Exception $e){
         return "Fatal error - ".$e->getMessage();
     }
    }

    public function elimina($id)
    {
      try{
         $user = preguntas::findOrFail($id);
         $user->delete();
         return redirect()->to('admin/pregunta')->with('message','Pregunta eliminada');;
     } catch (Exception $e){
         return "Fatal error - ".$e->getMessage();
     }
    }

    public function eliminarCita($id)
    {
      try{
        $cita = citas::findOrFail($id);
        Mail::send('emails.eliminarCita',compact('cita'), function (Message $message) use($cita){
          $message ->to($cita->mail,$cita->nombre)
              ->from('laravelsokdesa@gmail.com','Cosmiatria Company')
              ->subject('Cancelación');
        });;

        $cita->delete();
        return redirect()->to('admin')->with('message','Cita eliminado');;
     } catch (Exception $e){
         return "Fatal error - ".$e->getMessage();
     }
    }

    public function actualizarCita($id)
    {
        $cita = citas::findOrFail($id);
        $hora = Hora::all();
        $servicios = servicios::all();
        return view('admin.reagendar',compact('cita','hora','servicios'));
        /*Mail::send('emails.eliminarCita',compact('cita'), function (Message $message) use($cita){
          $message ->to($cita->mail,$cita->nombre)
              ->from('laravelsokdesa@gmail.com','Cosmiatria Company')
              ->subject('Cancelación');
        });;*/
        //$cita->save();
        //return redirect()->to('admin')->with('message','Cita Actualizada');;
    }

    public function actualizarCitaPost(Request $request, $id)
    {
        $cita = citas::findOrFail($id);

        /*Mail::send('emails.eliminarCita',compact('cita'), function (Message $message) use($cita){
          $message ->to($cita->mail,$cita->nombre)
              ->from('laravelsokdesa@gmail.com','Cosmiatria Company')
              ->subject('Cancelación');
        });;*/
        $cita->servicio = $request->servicio;
        $cita->mail = $request->mail;
        $cita->fecha = $request->date;
        $cita->hora = $request->hora;
        $cita->numero = $request->telefono;
        $cita->save();
        return redirect()->to('admin')->with('message','Cita Actualizada');;
    }


    public function editarp($id)
    {
      $pregunta = preguntas::find($id);
      return view('admin.editp',['pregunta'=>$pregunta]);
    }

    public function editpromo($id)
    {
      $promocion = promocion::find($id);
      return view('admin.editprom', ['promocion'=>$promocion]);
    }

    public function actpromo(Request $request, $id)
    {
      $promocion = promocion::find($id);
     if($request->file != "")
     {
       $imag = $request->file;
       $nombre = $imag->getClientOriginalName();
       \Storage::disk('local')->put($nombre,  \File::get($imag));
       $promocion->imagen        =$nombre;
      }
       $promocion->save();
     //Session::flash('message','Servicio Actualizado Correctamente');
     //return redirect()->to('admin.servicios');
     return redirect()->to('admin/promocion')->with('message','Imagen actualizada');
    // echo($request);
    }

    public function actualiza(Request $request, $id)
    {
      $preg = preguntas::find($id);
     $preg->pregunta     = $request->pregunta;
     $preg->respuesta    = $request->respuesta;
     $preg->save();
     return redirect()->to('admin/pregunta')->with('message','Pregunta actualizada');
    }
}
