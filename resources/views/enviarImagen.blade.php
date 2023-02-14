@extends('layouts.app')
@section('content')
    <div class="parent">
        <div class="izquierda">
            @include('izquierda')
        </div>
        <div class="derecha">
            <form action="{{ route('enviarImagenRequest') }}">
                @csrf
                <label for="numero">{{ __('Numero al que desea enviar la imagen') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
                <label for="url">{{ __('Link de la imagen que desea enviar') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="url" id="url"
                    class="form-control">
                <label for="textoimagen">{{ __('Descripcion de la imagen') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="textoimagen" id="textoimagen"
                    class="form-control">
                <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar Imagen">
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
