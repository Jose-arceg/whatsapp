@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('agregarAGrupoRequest') }}">
            @csrf
            <input style="width: 400px; margin-top: 10px" type="text" name="grupo" id="grupo" class="form-control">
            <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
            <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Agregar al Grupo">
        </form>
    </div>
@endsection
