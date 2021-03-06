<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\citas;
use App\Hora;
use App\servicios;
use App\promocion;
class ControllerPrincipal extends Controller
{

    public function index(){

        //$obj = Hora::findOrFail("1");
      //  $obj = DB::table('servicios')->get();
        //dd($obj);
        $hora = Hora::all();
        $servicios = servicios::all();
        $promocion = promocion::all();
        //return view('cosmiatria.index',['servicio' => $servicios]);
        //configuaración

        return view('cosmiatria.index',compact('servicios','hora','promocion'));
    }


    public function store(Request $request)
    {

      $this->validate($request, [
        'nombre' => ['required','max:100'],
        'telefono' => ['required','digits:10'],
        'mail'=>    ['required','email'],
        'date'=>   ['required'],
      ]);
     //$datos= request()->all();
     citas::create([
       'nombre'=>$request['nombre'],
       'servicio'=>$request['servicio'],
       'mail'=>$request['mail'],
       'fecha'=>$request['date'],
       'hora'=>$request['hora'],
       'numero'=>$request['telefono'],
       'estatus'=>false,
       'atendido'=>false,
     ]);


     return redirect()->to('/')->with('message','Solicitud enviada, confirmacion por correo');

     //dd($request);
     //return ;
    }

}
