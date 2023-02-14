<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class WhatsAppController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new \GuzzleHttp\Client();
    }

    public function obtenerGrupos()
    {
        $request = new Request('GET', env('WSP_URL') . '/own/grupos?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function crearGrupo()
    {
        $body = '
        {
            "nombre": "Grupo Demo Prueba",
            "numeros": [
                            "5213344556677",
                            "5213344556688",
                            "5213344556699"
                        ]
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/crear-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function agregarAGrupo()
    {
        $body = '{
                    "groupid": "120363028469440899@g.us",
                    "numero": "5211122334455"
                }';
        $request = new Request('POST', env('WSP_URL') . '/own/agregar-a-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function eliminarDeGrupo()
    {
        $body = '{
                    "groupid": "120363028469440899@g.us",
                    "numero": "5211122334455"
                }';
        $request = new Request('POST', env('WSP_URL') . '/own/eliminar-de-grupo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function mensajeAGrupo()
    {
        $body = '{
            "numero" : "12345678@g.us",
            "mensaje": "Hola, como estan? prueba postman"
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-mensaje-chatId?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function archivoAGrupo()
    {
        $body = '{
            "numero" : "12345678@g.us",
            "url": "https://img.freepik.com/free-photo/woman-showing-whatsapp-messenger-icon_53876-41312.jpg",
            "textoimagen" : "Texto de la imagen"
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-archivo-chatId?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarMensaje()
    {
        $body = '{
            "numero" : "5213344556677",
            "mensaje": "Hola, como estas?"
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-mensaje?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarArchivo()
    {
        $body = '{
            "numero" : "5213344556677",
            "url": "https://whatzmeapi.com/docs/WhatzMeApi-PreguntasFrecuentes.pdf"
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-archivo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarImagen()
    {
        $body = '{
            "numero" : "5213344556677",
            "url": "http://valerik.com.mx/uploads/about_04.jpg",
            "textoimagen" : "Este texto puede ser largo con emojis 😃 solo aplica cuando envias imagenes."
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-archivo?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarBotones()
    {
        $body = '{
            "numero" : "5213344556677",
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
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-botones?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function enviarUbicacion()
    {
        $body = '{
                    "numero" : "5213344556677",
                    "direccion" : "Palacio de los deportes",
                    "latitud": "19.4193295",
                    "longitud": "-99.1020533"
                }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-ubicacion?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function limpiarMensajes()
    {
        $body = '';
        $request = new Request('POST', env('WSP_URL') . '/own/limpiar-mensajes?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function mensajeVariosContactos()
    {
        $body = '{
        "numeros": [
           "5213344556677",
            "5213344556688",
            "5213344556699",
            "5213344556600"],
        "mensaje" : "Hola, buen día 👋 segunda prueba enviar-mensaje-muchos-contactos ",
        "webhookUrl" : "URL Opcional para que te notifiquetemos por POST cuando termina el envio",
        "nombreCampania" : "Opcional si deseas que se registren los resultados de tu envio en el /dashboard"
        }';
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-mensaje-muchos-contactos?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);

    }

    public function muchosMensajesMuchosContactos()
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
        $request = new Request('POST', env('WSP_URL') . '/own/enviar-muchos-mensajes-muchos-contactos?token=' . env('WSP_API_TOKEN'), [], $body);
        $res = $client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function obtenerContactos()
    {
        $request = new Request('GET', env('WSP_URL') . '/own/contactos?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }

    public function reiniciarInstancia()
    {
        $request = new Request('GET', env('WSP_URL') . '/own/reiniciar-instancia?token=' . env('WSP_API_TOKEN'));
        $res = $this->client->sendAsync($request)->wait();
        $response = json_decode($res->getBody()->getContents());
        dd($response);
    }
}
