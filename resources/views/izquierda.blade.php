<div>
    <table>
        <thead>
            {{--
            <tr>
                <th><a href="{{ route('') }}">{{ __('Ver contactos') }}</a></th>
            </tr>
            --}}
            <tr>
                <th><a href="{{ route('abrirEnviarMensaje') }}">{{ __('Enviar Mensaje') }}</a></th>
            </tr>
            <tr>
                <th><a href="{{ route('abrirEnviarImagen') }}">{{ __('Enviar Imagen') }}</a></th>
            </tr>
            <tr>
                <th><a href="{{ route('abrirEnviarArchivo') }}">{{ __('Enviar Archivo') }}</a></th>
            </tr>
            <tr>
                <th><a href="{{ route('abrirCrearGrupo') }}">{{ __('Crear Grupo') }}</a></th>
            </tr>
            {{--
            <tr>
                <th><a href="{{ route('') }}">{{ __('Ver Grupos') }}</a></th>
            </tr>
            --}}
            <tr>
                <th><a href="{{ route('abrirAgregarAGrupo') }}">{{ __('Agregar a Grupo') }}</a></th>
            </tr>
            <tr>
                <th><a href="{{ route('abrirEliminarDeGrupo') }}">{{ __('Eliminar de Grupo') }}</a></th>
            </tr>
            <tr>
                <th><a href="{{ route('abrirEnviarMensajeAGrupo') }}">{{ __('Enviar mensaje a grupo') }}</a>
                </th>
            </tr>
            <tr>
                <th><a
                        href="{{ route('abrirEnviarMensajeVariosContactos') }}">{{ __('Enviar mensaje a varios contactos') }}</a>
                </th>
            </tr>
        </thead>
    </table>
</div>
