<?php

namespace App\Http\Controllers;

use App\Http\Requests\agregarAGrupoRequest;
use App\Http\Requests\crearGrupoRequest;
use App\Http\Requests\eliminarDeGrupoRequest;
use App\Http\Requests\enviarArchivoRequest;
use App\Http\Requests\enviarImagenRequest;
use App\Http\Requests\enviarMensajeAGrupoRequest;
use App\Http\Requests\enviarMensajeRequest;
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

    public function enviarMensaje(enviarMensajeRequest $request)
    {
        dd($request);
        $body = '{
            "numero" : ' . $request->numero . ',
            "mensaje": ' . $request->mensaje . '
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-mensaje?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
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
        dd($request);
        $body = '{
        "numeros": ' . $request->nuneros . ',
        "mensaje" : ' . $request->mensaje . '
        }';
        $grequest = new GRequest('POST', env('WSP_URL') . '/own/enviar-mensaje-muchos-contactos?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($grequest)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }
    /*
    public function muchosMensajesMuchosContactos(Request $request)
    {
    $client = new Client();
    $body = '{
    "contactos" :
    [
    [5213344556688,"Bety"," 70 USD"," 18 de Noviembre del 2022"  ],
    [5213344556688,"Gerardo"," 35 USD"," 2 de Diciembre del 2022"  ],
    [5213344556688,"Lupita","60 USD"," 7 de Diciembre del 2022"  ],
    [5213344556688,"Erick"," 40 USD"," 23 de Noviembre del 2022"  ]
    ]
    ,
    "mensaje" : "Hola %1 enviar-muchos-mensajes-muchos-contactos 👋, soy Fernando tu asesor de Mi Empresa espero te encuentres muy bien, además de saludarte te recuerdo que tienes un pago que realizar 😯 por la cantidad de %2 y lo tienes que realizar antes del %3 👍, cualquier duda estoy a tus ordenes, WhatzMeApi.com",
    "webhookUrl" : "URL Opcional para que te notifiquetemos por POST cuando termina el envio",
    "nombreCampania" : "Opcional si deseas que se registren los resultados de tu envio en el /dashboard"
    }';
    $grequest = new GRequest('POST', '{{produccionserver}}/own/enviar-muchos-mensajes-muchos-contactos?token=' . env('WSP_API_TOKEN'), [], $body);
    $res = $client->sendAsync($grequest)->wait();
    echo $res->getBody();
    }
     */
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
}
