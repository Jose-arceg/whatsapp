<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VistasController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\WhatsAppRequestsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/obtenerGrupos', [WhatsAppController::class, 'obtenerGrupos']);
Route::get('/obtenerGruposRequest', [WhatsAppRequestsController::class, 'obtenerGrupos']);

Route::post('/crearGrupo', [WhatsAppController::class, 'crearGrupo']);
Route::get('/crearGrupoRequest', [WhatsAppRequestsController::class, 'crearGrupo'])->name('crearGrupoRequest');

Route::post('/agregarGrupo', [WhatsAppController::class, 'agregarGrupo']);
Route::post('/agregarGrupoRequest', [WhatsAppRequestsController::class, 'agregarGrupo'])->name('agregarAGrupoRequest');

Route::post('/eliminarDeGrupo', [WhatsAppController::class, 'eliminarDeGrupo']);
Route::get('/eliminarDeGrupoRequest', [WhatsAppRequestsController::class, 'eliminarDeGrupo'])->name('eliminarDeGrupoRequest');

Route::post('/mensajeAGrupo', [WhatsAppController::class, 'mensajeAGrupo']);
Route::get('/mensajeAGrupoRequest', [WhatsAppRequestsController::class, 'mensajeAGrupo'])->name('enviarMensajeAGrupoRequest');

Route::post('/enviarMensaje', [WhatsAppController::class, 'enviarMensaje']);
Route::get('/enviarMensajeRequest', [WhatsAppRequestsController::class, 'enviarMensaje'])->name('enviarMensajeRequest');

Route::post('/enviarArchivo', [WhatsAppController::class, 'enviarArchivo']);
Route::get('/enviarArchivoRequest', [WhatsAppRequestsController::class, 'enviarArchivo'])->name('enviarArchivoRequest');

Route::post('/enviarImagen', [WhatsAppController::class, 'enviarImagen']);
Route::get('/enviarImagenRequest', [WhatsAppRequestsController::class, 'enviarImagen'])->name('enviarImagenRequest');

Route::post('/enviarBotones', [WhatsAppController::class, 'enviarBotones']);
Route::post('/enviarBotonesRequest', [WhatsAppRequestsController::class, 'enviarBotones'])->name('enviarBotonesRequest');

Route::post('/enviarUbicacion', [WhatsAppController::class, 'enviarUbicacion']);
Route::get('/enviarUbicacionRequest', [WhatsAppRequestsController::class, 'enviarUbicacion'])->name('enviarUbicacionRequest');

Route::get('/limpiarMensaajes', [WhatsAppController::class, 'limpiarMensaajes']);
Route::get('/limpiarMensaajesRequest', [WhatsAppRequestsController::class, 'limpiarMensaajes']);

Route::post('/mensajeVariosContactos', [WhatsAppController::class, 'mensajeVariosContactos']);
Route::get('/mensajeVariosContactosRequest', [WhatsAppRequestsController::class, 'mensajeVariosContactos'])->name('enviarMensajeVariosContactosRequest');

Route::get('/obtenerContactos', [WhatsAppController::class, 'obtenerContactos']);
Route::get('/obtenerContactosRequest', [WhatsAppRequestsController::class, 'obtenerContactos']);

Route::get('/reiniciarInstancia', [WhatsAppController::class, 'reiniciarInstancia']);
Route::get('/reiniciarInstanciaRequest', [WhatsAppRequestsController::class, 'reiniciarInstancia']);

Route::get('/agregarCliente', [ClientesController::class, 'agregarCliente'])->name('agregarCliente');
Route::get('/vincular', [WhatsAppRequestsController::class, 'vincular'])->name('vincular');
Route::get('/cerrarSesion', [WhatsAppRequestsController::class, 'cerrarSesion'])->name('cerrarSesion');

##########################################################################################

Route::get('/abrirEnviarMensaje', [VistasController::class, 'abrirEnviarMensaje'])->name('abrirEnviarMensaje');
Route::get('/abrirCrearGrupo', [VistasController::class, 'abrirCrearGrupo'])->name('abrirCrearGrupo');
Route::get('/abrirAgregarAGrupo', [VistasController::class, 'abrirAgregarAGrupo'])->name('abrirAgregarAGrupo');
Route::get('/abrirEliminarDeGrupo', [VistasController::class, 'abrirEliminarDeGrupo'])->name('abrirEliminarDeGrupo');
Route::get('/abrirEnviarMensajeAGrupo', [VistasController::class, 'abrirEnviarMensajeAGrupo'])->name('abrirEnviarMensajeAGrupo');
Route::get('/abrirEnviarArchivo', [VistasController::class, 'abrirEnviarArchivo'])->name('abrirEnviarArchivo');
Route::get('/abrirEnviarImagen', [VistasController::class, 'abrirEnviarImagen'])->name('abrirEnviarImagen');
Route::get('/abrirEnviarBotones', [VistasController::class, 'abrirEnviarBotones'])->name('abrirEnviarBotones');
Route::get('/abrirEnviarUbicacion', [VistasController::class, 'abrirEnviarUbicacion'])->name('abrirEnviarUbicacion');
Route::get('/abrirEnviarMensajeVariosContactos', [VistasController::class, 'abrirEnviarMensajeVariosContactosc'])->name('abrirEnviarMensajeVariosContactos');
Route::get('/abrirAgregarCliente', [VistasController::class, 'abrirAgregarClientes'])->name('abrirAgregarCliente');
Route::get('/abrirVerGrupos', [WhatsAppRequestsController::class, 'obtenerGrupos'])->name('abrirVerGrupos');
Route::get('/abrirVerContactos', [WhatsAppRequestsController::class, 'obtenerContactos'])->name('abrirVerContactos');
Route::get('/abrirObtenerMensajes', [VistasController::class, 'abrirObtenerMensajes'])->name('abrirObtenerMensajes');
Route::get('/abrirObtenerMensajes1', [VistasController::class, 'abrirObtenerMensajes1'])->name('abrirObtenerMensajes1');
Route::get('/sincronizarMensajes', [VistasController::class, 'sincronizarMensajes'])->name('sincronizarMensajes');
Route::get('/guardarMensajes', [VistasController::class, 'guardarMensajes'])->name('guardarMensajes');
