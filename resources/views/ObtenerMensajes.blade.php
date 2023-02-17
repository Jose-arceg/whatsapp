@extends('layouts.app')
@section('content')
    <form action="">
        <label for="numero">{{ __('Numero del que desea ver los mensajes') }}</label>
        <input style="width: 400px; margin-top: 10px" type="text" name="numero" id="numero" class="form-control">
    </form>
    @if ($data->mensajes)
        <table>
            <thead>
                <tr>
                    <th>
                        {{ __('Nombre') }}
                    </th>
                    <th>
                        {{ __('Mensaje') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->mensajes as $men)
                    @if ($men->autor == 525614816992)
                        <tr>
                            <td>
                                {{ $men->autor }}
                            </td>
                            <td>
                                {{ $men->texto }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
