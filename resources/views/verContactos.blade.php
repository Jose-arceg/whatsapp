@extends('layouts.app')
@section('content')
    @foreach ($contactos as $grupo)
        <table>
            <thead>
                <tr>
                    <th>
                        {{ __('numero') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $request->numero }}
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection
