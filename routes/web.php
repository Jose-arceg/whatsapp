<?php

use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\WhatsAppControllerRequests;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/obtenerGrupos', [WhatsAppController::class, 'obtenerGrupos']);
Route::get('/obtenerGrupos', [WhatsAppControllerRequests::class, 'obtenerGrupos']);

Route::post('/crearGrupo', [WhatsAppController::class, 'crearGrupo']);
Route::post('/crearGrupo', [WhatsAppControllerRequests::class, 'crearGrupo']);

Route::post('/agregarGrupo', [WhatsAppController::class, 'agregarGrupo']);
Route::post('/agregarGrupo', [WhatsAppControllerRequests::class, 'agregarGrupo']);

Route::post('/eliminarDeGrupo', [WhatsAppController::class, 'eliminarDeGrupo']);
Route::post('/eliminarDeGrupo', [WhatsAppControllerRequests::class, 'eliminarDeGrupo']);

Route::post('/mensajeAGrupo', [WhatsAppController::class, 'mensajeAGrupo']);
Route::post('/mensajeAGrupo', [WhatsAppControllerRequests::class, 'mensajeAGrupo']);

Route::post('/archivoAGrupo', [WhatsAppController::class, 'archivoAGrupo']);
Route::post('/archivoAGrupo', [WhatsAppControllerRequests::class, 'archivoAGrupo']);

Route::post('/enviarMensaje', [WhatsAppController::class, 'enviarMensaje']);
Route::post('/enviarMensaje', [WhatsAppControllerRequests::class, 'enviarMensaje']);

Route::post('/enviarArchivo', [WhatsAppController::class, 'enviarArchivo']);
Route::post('/enviarArchivo', [WhatsAppControllerRequests::class, 'enviarArchivo']);

Route::post('/enviarImagen', [WhatsAppController::class, 'enviarImagen']);
Route::post('/enviarImagen', [WhatsAppControllerRequests::class, 'enviarImagen']);

Route::post('/enviarBotones', [WhatsAppController::class, 'enviarBotones']);
Route::post('/enviarBotones', [WhatsAppControllerRequests::class, 'enviarBotones']);

Route::post('/enviarUbicacion', [WhatsAppController::class, 'enviarUbicacion']);
Route::post('/enviarUbicacion', [WhatsAppControllerRequests::class, 'enviarUbicacion']);

Route::get('/limpiarMensaajes', [WhatsAppController::class, 'limpiarMensaajes']);
Route::get('/limpiarMensaajes', [WhatsAppControllerRequests::class, 'limpiarMensaajes']);

Route::post('/mensajeVariosContactos', [WhatsAppController::class, 'mensajeVariosContactos']);
Route::post('/mensajeVariosContactos', [WhatsAppControllerRequests::class, 'mensajeVariosContactos']);

Route::get('/obtenerContactos', [WhatsAppController::class, 'obtenerContactos']);
Route::get('/obtenerContactos', [WhatsAppControllerRequests::class, 'obtenerContactos']);

Route::get('/reiniciarInstancia', [WhatsAppController::class, 'reiniciarInstancia']);
Route::get('/reiniciarInstancia', [WhatsAppControllerRequests::class, 'reiniciarInstancia']);
