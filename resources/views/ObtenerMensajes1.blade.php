@extends('layouts.app')
@section('content')
    <form action="">
        <label for="numero">{{ __('Numero del que desea ver los mensajes') }}</label>
        <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
    </form>
    @if ($mensajes)
        <table>
            <thead>
                <tr>
                    <th>
                        {{ __('Nombre') }}
                    </th>
                    <th>
                        {{ __('Mensaje') }}
                    </th>
                    <th>
                        {{ __('Fecha y hora') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mensajes as $men)
                    @if ($men->autor == 56987690393)
                        <tr>
                            <td>
                                {{ $men->autor }}
                            </td>
                            <td>
                                {{ $men->texto }}
                            </td>
                            <td>
                                {{ $men->fechahora }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
