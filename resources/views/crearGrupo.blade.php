@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('crearGrupoRequest') }}">
            @csrf
            <input style="width: 400px; margin-top: 10px" type="text" name="nombre" id="nombre" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros"
                class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros"
                class="form-control">
            <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar Mensaje">
        </form>
    </div>
@endsection
