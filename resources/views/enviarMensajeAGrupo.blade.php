@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('enviarMensajeAGrupoRequest') }}">
            @csrf
            <input style="width: 400px; margin-top: 10px" type="text" name="grupo" id="grupo" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="mensaje" id="mensaje" class="form-control">
            <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar Mensaje">
        </form>
    </div>
@endsection
