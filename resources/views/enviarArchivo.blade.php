@extends('layouts.app')
@section('content')
    <div class="parent">
        <div class="izquierda">
            @include('izquierda')
        </div>
        <div class="derecha">
            <form action="{{ route('enviarArchivoRequest') }}">
                @csrf
                <label for="numero">{{ __('Numero al que desea enviar un archivo') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero"
                    class="form-control @error('numero') is-invalid @enderror">
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="url">{{ __('Link del archivo que se deseea enviar') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="url" id="url"
                    class="form-control @error('url') is-invalid @enderror">
                @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit" value="Enviar archivo">
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
