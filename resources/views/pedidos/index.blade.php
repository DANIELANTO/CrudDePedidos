@extends('layout')

@section('content')
    <div class="mx-auto my-4 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="container mx-auto py-8">
                <div class="flex justify-between mb-6">
                    <h1 class="text-2xl font-bold mb-4">Lista de Pedidos</h1>
                    <a href="{{ route('pedidos.create') }}" class="bg-blue-500 text-white p-2 rounded mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Crear Nuevo Pedido</span>
                    </a>
                </div>
                <!--Mensaje de exito en pantalla-->
                @if ($message = Session::get('success'))
                    <!-- Snackbar -->
                    <div id="snackbar"
                        class="w-2/4 hidden fixed top-6 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-3 rounded">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <!--Mensaje si los registros vienen vacios de la DB-->
                @if ($pedidos->isEmpty())
                    <div class="text-center mt-10">
                        <h2 class="text-gray-500 text-xl font-semibold">No hay registros hasta el momento</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-gray-500 w-12 h-12 mx-auto mt-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                        </svg>
                    </div>
                @else
                    <table class="mt-10 min-w-full bg-white">
                        <thead>
                            <tr class="text-left">
                                <th>Medicamento</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Distribuidor</th>
                                <th>Sucursal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-2">{{ $pedido->medicamento }}</td>
                                    <td class="p-2">{{ $pedido->tipo }}</td>
                                    <td class="p-2">{{ $pedido->cantidad }}</td>
                                    <td class="p-2">{{ $pedido->distribuidor }}</td>
                                    <td class="p-2">{{ $pedido->sucursal }}</td>
                                    <td class="p-2">
                                        <div class="flex gap-2">
                                            <a href="{{ route('pedidos.edit', $pedido->id) }}"
                                                class="bg-blue-500 text-white p-2 rounded mb-4 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-5 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                                <span>Editar</span>
                                            </a>
                                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white p-2 rounded mr-2 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-5 mr-2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                    <span>Eliminar</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <script>
        // Mostrar el snackbar automáticamente si hay un mensaje de éxito
        @if (Session::has('success'))
            const snackbar = document.getElementById('snackbar');
            snackbar.classList.remove('hidden');
            setTimeout(function() {
                snackbar.classList.add('hidden');
            }, 10000); // 10 segundos
        @endif
    </script>
@endsection
