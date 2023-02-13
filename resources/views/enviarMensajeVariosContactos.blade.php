@extends('layouts.app')
@section('content')
    <div class="parent">
        <div class="izquierda">
            @include('izquierda')
        </div>
        <div class="derecha">
            <form action="{{ route('enviarMensajeVariosContactosRequest') }}">
                @csrf
                <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros"
                    class="form-control">
                <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros"
                    class="form-control">
                <input style="width: 400px; margin-top: 10px" type="text" name="numeros[]" id="numeros"
                    class="form-control">
                <input style="width: 400px; margin-top: 10px" type="text" name="mensaje" id="mensaje"
                    class="form-control">
                <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar Mensaje">
            </form>
        </div>
    </div>
    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(8, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .izquierda {
            grid-area: 2 / 2 / 8 / 4;
        }

        .derecha {
            grid-area: 2 / 5 / 8 / 8;
        }
    </style>
@endsection
