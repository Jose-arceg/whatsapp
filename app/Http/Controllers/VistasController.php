<?php

namespace App\Http\Controllers;

class VistasController extends Controller
{

    public function __construct()
    {

    }
    public function abrirEnviarMensaje()
    {
        return view('enviarMensaje');
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
}
