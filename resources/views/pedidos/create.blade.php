@extends('layout')

@section('content')
    <div class="mx-auto my-4 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="container mx-auto py-8">
                <div class="flex justify-between mb-6">
                    <h1 class="text-2xl font-bold mb-4">Crear Pedido</h1>
                    <div class="flex gap-2">
                        <!-- Botones -->
                        <button type="button" id="backBtn" class="bg-blue-500 text-white p-2 rounded flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 mr-2">
                                <path fill-rule="evenodd"
                                    d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Regresar</span>
                        </button>
                        <button type="button" id="confirmBtn" class="bg-blue-500 text-white p-2 rounded flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 mr-2">
                                <path fill-rule="evenodd"
                                    d="M6 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3H6Zm1.5 1.5a.75.75 0 0 0-.75.75V16.5a.75.75 0 0 0 1.085.67L12 15.089l4.165 2.083a.75.75 0 0 0 1.085-.671V5.25a.75.75 0 0 0-.75-.75h-9Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Crear</span>
                        </button>
                    </div>
                </div>
                <form id="pedidoForm" method="POST" action="{{ route('pedidos.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="medicamento" class="block text-gray-700">Nombre del Medicamento:</label>
                        <input type="text" id="medicamento" name="medicamento" class="border p-2 w-full" required>
                    </div>
                    <div class="mb-4">
                        <label for="tipo" class="block text-gray-700">Tipo de Medicamento:</label>
                        <select id="tipo" name="tipo" class="border p-2 w-full" required>
                            <option value=""></option>
                            <option value="Analgésico">Analgésico</option>
                            <option value="Antibiótico">Antibiótico</option>
                            <option value="Antiácido">Antiácido</option>
                            <option value="Antidepresivo">Antidepresivo</option>
                            <option value="Anestésico">Anestésico</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="cantidad" class="block text-gray-700">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" class="border p-2 w-full" required>
                    </div>

                    <!-- Distribuidor (Radio Buttons) -->
                    <div class="mb-6">
                        <label>Distribuidor Farmacéutico:</label><br>
                        <div class="flex gap-6 mt-1">
                            <div class="flex items-center gap-1">
                                <input type="radio" id="cofarma" name="distribuidor" value="Cofarma" required>
                                <label for="cofarma">Cofarma</label><br>
                            </div>

                            <div class="flex items-center gap-1">
                                <input type="radio" id="empsephar" name="distribuidor" value="Empsephar">
                                <label for="empsephar">Empsephar</label><br>
                            </div>

                            <div class="flex items-center gap-1">
                                <input type="radio" id="cemefar" name="distribuidor" value="Cemefar">
                                <label for="cemefar">Cemefar</label>
                            </div>
                        </div>
                    </div>

                    <!-- Sucursal (Checkboxes) -->
                    <div>
                        <label>Sucursal de Destino:</label><br>
                        <div class="flex gap-6 mt-1">
                            <div class="flex items-center gap-1">
                                <input type="checkbox" id="principal" name="sucursal[]" value="Principal">
                                <label for="principal">Farmacia Principal</label><br>
                            </div>

                            <div class="flex items-center gap-1">
                                <input type="checkbox" id="secundaria" name="sucursal[]" value="Secundaria">
                                <label for="secundaria">Farmacia Secundaria</label>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-6 flex justify-end">
                    <button type="button" id="clearBtn" class="bg-gray-500 text-white p-2 rounded mr-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Limpiar Formulario</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 id="modalTitle" class="text-xl font-bold mb-4"></h2>
            <p id="modalContent" class="mb-4"></p>
            <div class="flex justify-end gap-4">
                <button id="cancelBtn" class="bg-red-500 text-white p-2 rounded mr-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                        <path fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Cancelar</span>
                </button>
                <button id="submitBtn" class="bg-blue-500 text-white p-2 rounded flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                        <path
                            d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                    </svg>
                    <span>Enviar Pedido</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Snackbar -->
    <div id="snackbar"
        class="w-2/4 hidden fixed top-6 left-1/2 transform -translate-x-1/2 bg-red-500 text-white p-3 rounded">
        Error: Verifique los datos.</div>

    <script>
        document.getElementById('clearBtn').addEventListener('click', function() {
            // Restablecer los valores de los campos
            document.getElementById('pedidoForm').reset();

            // Limpiar clases de error
            document.querySelectorAll('.border-red-500').forEach(element => {
                element.classList.remove('border-red-500', 'bg-red-100');
            });
        });

        document.getElementById('confirmBtn').addEventListener('click', function() {
            // Recuperar valores de los campos de entrada
            const medicamento = document.getElementById('medicamento').value.trim();
            const tipo = document.getElementById('tipo').value;
            const cantidad = parseFloat(document.getElementById('cantidad').value.trim());

            // Recuperar distribuidor seleccionado
            const distribuidorElement = document.querySelector('input[name="distribuidor"]:checked');
            const distribuidor = distribuidorElement ? distribuidorElement.value :
                null; // Comprobar si está seleccionado

            // Recuperar sucursales seleccionadas
            const sucursalCheckboxes = document.querySelectorAll('input[name="sucursal[]"]:checked');
            const sucursalArray = Array.from(sucursalCheckboxes).map(checkbox => checkbox
                .value); // Crear un arreglo de valores seleccionados

            // Validar campos
            let hasError = false;

            // Limpiar estilos de errores anteriores
            document.getElementById('medicamento').classList.remove('border-red-500', 'bg-red-100');
            document.getElementById('tipo').classList.remove('border-red-500');
            document.getElementById('cantidad').classList.remove('border-red-500', 'bg-red-100');

            const distribuidorRadios = document.getElementsByName('distribuidor');
            distribuidorRadios.forEach(radio => {
                radio.classList.remove('border-red-500');
            });

            const allSucursalCheckboxes = document.querySelectorAll('input[name="sucursal[]"]');
            allSucursalCheckboxes.forEach(checkbox => {
                checkbox.classList.remove('border-red-500');
            });

            // Validaciones
            if (!medicamento.match(/^[a-zA-Z0-9\s]+$/)) {
                document.getElementById('medicamento').classList.add('border-red-500', 'bg-red-100');
                hasError = true;
            }

            if (!tipo) {
                document.getElementById('tipo').classList.add('border-red-500');
                hasError = true;
            }

            if (isNaN(cantidad) || cantidad <= 0) {
                document.getElementById('cantidad').classList.add('border-red-500', 'bg-red-100');
                hasError = true;
            }

            if (!distribuidor) {
                // Resaltar el grupo de radio buttons
                distribuidorRadios.forEach(radio => {
                    radio.classList.add('border-red-500');
                });
                hasError = true;
            }

            if (sucursalArray.length === 0) {
                allSucursalCheckboxes.forEach(checkbox => {
                    checkbox.classList.add('border-red-500');
                });
                hasError = true;
            }

            // Mostrar Snackbar o Modal de Confirmación
            if (hasError) {
                showSnackbar('Error: Verifique los datos.', true);
            } else {
                document.getElementById('modalTitle').innerText = `Pedido al distribuidor ${distribuidor}`;
                document.getElementById('modalContent').innerText =
                    `${cantidad} unidades del ${tipo} ${medicamento}.`;

                let sucursalText = 'Para la farmacia situada en ';
                sucursalArray.forEach(function(s) {
                    sucursalText += s === 'Principal' ? 'Calle de la Rosa n.28' : 'Calle Alcazabilla n.3';
                    sucursalText += ' y ';
                });
                sucursalText = sucursalText.slice(0, -3); // Removiendo el último " y "
                document.getElementById('modalContent').innerText += ` ${sucursalText}.`;

                document.getElementById('confirmationModal').classList.remove('hidden');
            }
        });
        // Regresar pagina
        document.getElementById('backBtn').addEventListener('click', function() {
            window.location.href = '/pedidos';
        });

        // Cancelar el pedido
        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.getElementById('confirmationModal').classList.add('hidden');
        });

        // Enviar el pedido
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('pedidoForm').submit();
        });

        // Función para mostrar el snackbar
        function showSnackbar(message, isError = false) {
            const snackbar = document.getElementById('snackbar');
            snackbar.innerText = message;
            snackbar.classList.remove('hidden');

            // Cambiar el color del snackbar según sea éxito o error
            if (isError) {
                snackbar.classList.remove('bg-green-500');
                snackbar.classList.add('bg-red-500');
            } else {
                snackbar.classList.remove('bg-red-500');
                snackbar.classList.add('bg-green-500');
            }

            setTimeout(function() {
                snackbar.classList.add('hidden');
            }, 10000); // 10 segundos
        }
    </script>
@endsection
