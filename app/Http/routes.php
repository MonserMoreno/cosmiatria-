<?php

use App\citas;
use App\servicios;
use App\preguntas;
use App\promocion;

use Illuminate\Mail\Message;

//Route::get('/gmaps', ['as ' => 'gmaps', 'uses' => 'GmapsController@index']);
//Route::get('/', ['as ' => 'gmaps', 'uses' =>  'ControllerPrincipal@index']);
Route::get('/','ControllerPrincipal@index');
  //$servicios = servicios::all();
    //return view('cosmiatria.index',compact('servicios'));
//});



Route::get('servicios', function () {
  //$imagens = servicios::imagen();
  //$public_path = public_path();
  //$url = $public_path.'/storage/'.$imagens;

  $servicios = servicios::all();
  //$imagens = servicios::imagen();
  //$public_path = public_path();
  //$url = $public_path.'/storage/'.$servicios['imagen'];
   //dd($servicios);
  return view('cosmiatria/servicios',compact('servicios'));
  //  return view('cosmiatria/servicios');
});

Route::get('preguntas', function () {

  $preguntas = preguntas::all();

  return view('cosmiatria/preguntas',compact('preguntas'));
  //  return view('cosmiatria/servicios');
});

//Route::get('admin', 'AdminController@index');

Route::post('/CrearCita','ControllerPrincipal@store');


Route::get('email', function () { //funcion de prueba de envio de correo

  Mail::send('emails.confirmacion',['name'=> 'sok'], function (Message $message){
    $message ->to('theonesok@gmail.com','larave')
        ->from('laravelsokdesa@gmail.com','Styed');
  });

});

Route::get('login',[
  'uses'  => 'Auth\AuthController@getLogin',
  'as'    => 'login'
]);

Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', [
  'uses' => 'Auth\AuthController@getLogout',
  'as'   => 'logout'
]);


Route::group(['middleware' => 'auth'], function(){
      Route::get('admin', [
        'uses'  => 'AdminController@index',
        'as'    => 'admin'
      ]);

      Route::get('admin/servicios','AdminController@vista');
      Route::get('admin/nServicio','AdminController@vistfaNS');
      Route::post('admin/CrearServicio','AdminController@store');
      Route::get('admin/pregunta','AdminController@vistaP');
      Route::get('admin/nPregunta','AdminController@vistaNP');
      Route::post('admin/CrearPregunta','AdminController@nuevaP');
      Route::get('edit/{usu}','AdminController@edit')->where('usu','[0-9]+');
      Route::post('edit/{usu}','AdminController@update');
      Route::get('eliminar/{usu}','AdminController@destroy')->where('usu','[0-9]+');
      Route::get('editp/{usu}','AdminController@editarp')->where('usu','[0-9]+');
      Route::post('editp/{usu}','AdminController@actualiza');
      Route::get('eliminarp/{usu}','AdminController@elimina')->where('usu','[0-9]+');
      Route::get('admin/promocion', 'AdminController@vistapromocion');
      Route::get('editprom/{usu}','AdminController@editpromo')->where('usu','[0-9]+');
      Route::post('editprom/{usu}','AdminController@actpromo');

      Route::get('citaConfirmar/{cita}','AdminController@confirmarcion');
      Route::get('eliminarCita/{cita}','AdminController@eliminarCita')->where('cita','[0-9]+');
      Route::get('actualizarCita/{cita}','AdminController@actualizarCita')->where('cita','[0-9]+');
      Route::post('actualizarCita/{cita}','AdminController@actualizarCitaPost');
});
