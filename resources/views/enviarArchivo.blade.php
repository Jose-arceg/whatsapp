@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('enviarArchivoRequest') }}">
            @csrf
            <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="url" id="url" class="form-control">
            <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar archivo">
        </form>
    </div>
@endsection
