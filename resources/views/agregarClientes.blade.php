@extends('layouts.app')
@section('content')
    <div class="parent">
        <div class="izquierda">
            @include('izquierda')
        </div>
        <div class="derecha">
            @if (session()->has('success'))
                <div id="success" class="alert alert-success" style="width: 300px">
                    {{ session()->get('success') }}
                </div>
            @endif
            <script>
                setTimeout(function() {
                    document.getElementById('success').style.display = 'none';
                }, 3000);
            </script>

            <form action="{{ route('agregarCliente') }}">
                @csrf
                <label for="nombre">{{ __('nombre del cliente') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="nombre" id="grupo"
                    class="form-control @error('nombre') is-invalid @enderror">
                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="numero">{{ __('Numero del cliente') }}</label>
                <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero"
                    class="form-control @error('numero') is-invalid @enderror">
                @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input style="width: 400px; margin-top: 10px" class="btn btn-success" type="submit"
                    value="Agregar Cliente">
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
