<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class VistasController extends Controller
{
    private $client;
    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
    public function abrirEnviarMensaje()
    {
        $clientes = clientes::all();
        return view('enviarMensaje')->with('clientes', $clientes);
    }
    public function abrirCrearGrupo()
    {
        return view('crearGrupo');
    }

    public function abrirAgregarAGrupo()
    {
        return view('agregarAGrupo');
    }
    public function abrirEliminarDeGrupo()
    {
        return view('eliminarDeGrupo');
    }
    public function abrirEnviarMensajeAGrupo()
    {
        return view('enviarMensajeAGrupo');
    }
    public function abrirEnviarArchivo()
    {
        return view('enviarArchivo');
    }
    public function abrirEnviarImagen()
    {
        return view('enviarImagen');
    }
    public function abrirEnviarBotones()
    {
        return view('enviarBotones');
    }
    public function abrirEnviarMensajeVariosContactos()
    {
        return view('enviarMensajeVariosContactos');
    }
    public function abrirEnviarMensajeVariosContactosc()
    {
        $clientes = clientes::all();
        return view('enviarMensajeVariosContactosc')->with('clientes', $clientes);
    }
    public function abrirAgregarClientes()
    {

        return view('agregarClientes');
    }
    public function abrirObtenerMensajes()
    {
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN'), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());
        return view('ObtenerMensajes')->with('data', $data);
    }

    public function abrirObtenerMensajes1()
    {
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN') . '&ultimoMensaje=100', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());
        return view('ObtenerMensajes1')->with('data', $data);
    }
}
