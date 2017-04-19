<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GmapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //configuaración
      $config = array();
      $config['center'] = 'auto';
      $config['map_width'] = 400;
      $config['map_height'] = 400;
      $config['zoom'] = 11;
      $config['onboundschanged'] = 'if (!centreGot) {
          var mapCentre = map.getCenter();
          marker_0.setOptions({
              position: new google.maps.LatLng(19.075241, -98.164927)

          });
      }
      centreGot = true;';

      \Gmaps::initialize($config);

      // Colocar el marcador
      // Una vez se conozca la posición del usuario
      $marker = array();
      \Gmaps::add_marker($marker);

      $map = \Gmaps::create_map();

      //Devolver vista con datos del mapa
      return view('gmaps', compact('map'));
    }

    
}
