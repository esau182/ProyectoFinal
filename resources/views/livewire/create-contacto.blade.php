<div>
    <form wire:submit="save" class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="number"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número de emergencia</label>
            <input type="number" wire:model="number" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="+52 321 321 4321" required />
            <div>
                @error('number') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-5">
            <label for="password"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ingresa tu contraseña para confirmar</label>
            <input type="password" wire:model="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            <div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</div>

@script
<script>
    $wire.on('contactoAgregado', () => {
        toastify().success('Contacto Agregado');
    });

    $wire.on('passwordIncorrecta', () => {
        toastify().error('Error al ingresar la informacion');
    });

</script>
@endscript
