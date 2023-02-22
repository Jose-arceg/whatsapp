<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Models\Mensajes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN') . '&ultimoMensaje=400', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        return view('ObtenerMensajes')->with('data', $data);
    }

    private $mensajes = [];
    private $desde = 0;
    public function abrirObtenerMensajes1()
    {
        if ($this->desde == 0) {
            $this->mensajes = [];
        }
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN') . '&ultimoMensaje=' . $this->desde, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        $this->mensajes = array_merge($this->mensajes, $data->mensajes);

        if (count($data->mensajes, 0) > 90) {
            $this->desde += 100;
            $this->abrirObtenerMensajes1();
        } else {
            $this->desde = 0;
        }
        dd($this->mensajes);
        return view('ObtenerMensajes1')->with('mensajes', $this->mensajes);
    }

    private $mensajes1 = [];
    private $desde1 = 0;
    public function obtenerMensajes()
    {
        if ($this->desde1 == 0) {
            $mensajes1 = [];
        }
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN') . '&ultimoMensaje=' . $this->desde1, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        $this->mensajes1 = array_merge($this->mensajes1, $data->mensajes);

        if (count($data->mensajes, 0) == 100) {
            $this->desde1 += 100;
            $this->abrirObtenerMensajes1();
        } else {
            $this->desde1 = 0;
        }
    }

    public function sincronizarMensajes()
    {
        $existe = "";
        $this->obtenerMensajes();
        $mensajes = $this->mensajes1;
        $this->mensajes1 = [];
        $clientes = Clientes::all();
        foreach ($clientes as $cli) {
            foreach ($mensajes as $mensaje) {
                if ($cli->numero == $mensaje->autor) {
                    $existe = Mensajes::where('texto', $mensaje->texto)->where('telefono', $cli->numero)->where('id_api', $mensaje->id)->first();
                    if (!$existe) {
                        DB::table('mensajes')->insert([
                            'telefono' => $cli->numero,
                            'texto' => $mensaje->texto,
                            'id_api' => $mensaje->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }

    private $from = 0;
    public function guardarMensajes()
    {
        $response = $this->client->request('GET', env('WSP_URL') . '/own/mensajes?token=' . env('WSP_API_TOKEN') . '&ultimoMensaje=' . $this->from, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache',
            ],
        ]);
        $data = json_decode($response->getBody()->getContents());
        $mensajes = $data->mensajes;
        $clientes = Clientes::all();
        foreach ($clientes as $cli) {
            foreach ($mensajes as $mensaje) {
                if ($cli->numero == $mensaje->autor) {
                    $existe = Mensajes::where('texto', $mensaje->texto)->where('telefono', $cli->numero)->where('id_api', $mensaje->id)->first();
                    if (!$existe) {
                        DB::table('mensajes')->insert([
                            'telefono' => $cli->numero,
                            'texto' => $mensaje->texto,
                            'id_api' => $mensaje->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
        if (count($mensajes, 0) == 100) {
            $this->from += 100;
            $this->guardarMensajes();
        } else {
            $this->from = 0;
        }
        return back();
    }
}
