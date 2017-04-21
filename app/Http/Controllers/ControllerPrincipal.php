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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     //$datos= request()->all();
     citas::create([
       'nombre'=>$request['nombre'],
       'servicio'=>$request['servicio'],
       'mail'=>$request['mail'],
       'fecha'=>$request['date'],
       'hora'=>$request['hora'],
       'numero'=>$request['telefono'],
       'estatus'=>false,
     ]);
     return redirect()->to('/')->with('message','Solicitud enviada, confirmacion por correo');

     //dd($request);
     //return ;
    }

}
