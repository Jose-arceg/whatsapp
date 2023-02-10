@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('eliminarDeGrupoRequest') }}">
            @csrf
            <input style="width: 400px; margin-top: 10px" type="text" name="grupo" id="grupo" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
            <input style="width: 400px; margin-top: 10px" class="btn btn-danger" type="submit" value="Eliminar del Grupo">
        </form>
    </div>
@endsection
