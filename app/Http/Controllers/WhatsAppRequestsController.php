<?php

namespace App\Http\Controllers;

use App\Http\Requests\agregarAGrupoRequest;
use App\Http\Requests\crearGrupoRequest;
use App\Http\Requests\eliminarDeGrupoRequest;
use App\Http\Requests\enviarArchivoRequest;
use App\Http\Requests\enviarImagenRequest;
use App\Http\Requests\enviarMensajeAGrupoRequest;
use App\Http\Requests\enviarMensajeVariosContactosRequest;
use GuzzleHttp\Psr7\Request as GRequest;
use Illuminate\Http\Request;

class WhatsAppRequestsController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new \GuzzleHttp\Client();
    }

    public function obtenerGrupos()
    {
        $grequest = new GRequest('GET', env('WSP_URL') . ' /own/grupos?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($grequest)->wait();
        $grupos = json_decode($res->getBody()->getContents());
        return view('verGrupos')->with('grupos', $grupos);
    }

    public function crearGrupo(crearGrupoRequest $request)
    {
        dd($request->numeros);
        $body = '
        {
            "nombre": ' . $request->nombre . ',
            "numeros": ' . $request->numeros . ',
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/crear-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function agregarAGrupo(agregarAGrupoRequest $request)
    {
        dd($request);
        $body = '{
                    "groupid": ' . $request->grupo . ',
                    "numero": ' . $request->numero . '
                }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/agregar-a-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function eliminarDeGrupo(eliminarDeGrupoRequest $request)
    {
        dd($request);
        $body = '{
                    "groupid": ' . $request->grupo . ',
                    "numero": ' . $request->numero . '
                }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/eliminar-de-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function mensajeAGrupo(enviarMensajeAGrupoRequest $request)
    {
        dd($request);
        $body = '{
            "groupid": ' . $request->grupo . ',
            "mensaje": ' . $request->mensaje . '
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-mensaje-chatId?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarMensaje(Request $request)
    {

        $telefono = $request->numero;

        $telefono = str_replace([' ', '+'], '', $telefono);
        if (strlen($telefono) == 9) {

            $telefono = '56' . $telefono;
        } else if (strlen($telefono) == 8) {
            $telefono = '569' . $telefono;
        }
        $response = $this->client->request('POST', env('WSP_URL') . '/own/enviar-mensaje?token=' . env('WSP_API_TOKEN'), [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
            'json' => [
                'numero' => $telefono,
                'mensaje' => $request->mensaje,
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        dd($data);
        return redirect()->back();
    }

    public function enviarArchivo(enviarArchivoRequest $request)
    {
        dd($request);
        $body = '{
            "numero" : ' . $request->numero . ',
            "url": ' . $request->url . '
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-archivo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarImagen(enviarImagenRequest $request)
    {
        dd($request);
        $body = '{
            "numero" : ' . $request->numero . ',
            "url": ' . $request->url . ',
            "textoimagen" : ' . $request->textoimagen . '
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-archivo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarBotones(Request $request)
    {
        dd($request);
        $body = '{
            "numero" : ' . $request->numero . ',
            "mensaje": "Estamos para ayudarte, ¿Con que departamento quieres contactar?",
            "botones": [
            {
              "id": "!response 1",
              "texto": "Ventas"
            },
            {
              "id": "!response 2",
              "texto": "Atención a clientes"
            },
            {
              "id": "!response 3",
              "texto": "Soporte técnico"
            }
          ]
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-botones?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarUbicacion(Request $request)
    {
        dd($request);
        $body = '{
                    "numero" : ' . $request->numero . ',
                    "direccion" : ' . $request->direccion . ',
                    "latitud": ' . $request->latitud . ',
                    "longitud": ' . $request->longitud . '
                }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-ubicacion?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function limpiarMensajes()
    {
        $body = '';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/limpiar-mensajes?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function mensajeVariosContactos(enviarMensajeVariosContactosRequest $request)
    {
        $response = $this->client->request('POST', env('WSP_URL') . '/own/enviar-mensaje-muchos-contactos?token=' . env('WSP_API_TOKEN'), [

            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
            'json' => [
                'numeros' => $request->numeros,
                'mensaje' => $request->mensaje,
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        //devuelve exito: true
        dd($data);
    }

    public function obtenerContactos()
    {
        $grequest = new GRequest('GET', env('WSP_URL') . '/own/contactos?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($grequest)->wait();
        $contactos = json_decode($res->getBody()->getContents());
        dd($contactos);
        return view('verContactos')->with('contactos', $contactos);
    }

    public function reiniciarInstancia()
    {
        $grequest = new GRequest('GET', env('WSP_URL') . '/own/reiniciar-instancia?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($grequest)->wait();
        echo $res->getBody();
    }

    public function vincular()
    {
        $response = $this->client->request('GET', env('WSP_URL') . '/own/pantalla?token=' . env('WSP_API_TOKEN'), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        //devuelve status code 200
    }

    public function cerrarSesion()
    {
        $request = new GRequest('POST', env('WSP_URL') . '/own/cerrar-sesion?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($request)->wait();
        $data = json_decode($res->getBody()->getContents());
        dd($data);
        /*
    $response = $this->client->request('POST', env('WSP_URL') . '/own/cerrar-sesion?token=' . env('WSP_API_TOKEN'), [
    'headers' => [
    'Content-Type' => 'application/json',
    'Cache-Control' => 'no-cache',
    ],
    ]);
    $data = json_decode($response->getBody()->getContents());
    //devuelve exito: true
     */
    }
}
