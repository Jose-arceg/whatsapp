@extends('layouts.app')
@section('content')
    @foreach ($grupos as $grupo)
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
                        {{ $grupos->numero }}
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection
