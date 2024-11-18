<div>
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-10">
                    <div class="heading-39101 mb-5 position-relative">
                        <span class="backdrop text-center" style="font-size: 6em; font-weight: bold; color: rgba(0, 0, 0, 0.1); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: -1;">
                            Organismos
                        </span>
                        <h3 style="color: #000; font-weight: 600; font-size: 1.75em; margin-top: 10px;">
                            Sección especializada para organismos interesados
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <section class="my-5">
            <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
                <div class="relative overflow-hidden bg-gray-100 shadow-md rounded-lg">
                    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <button type="button"
                                wire:click="exportPdf"
                                class="inline-flex items-center h-10 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            <svg class="h-4 w-4 mr-2 -ml-1" fill="white" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                 aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                      d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                            </svg>
                            Exportar a PDF
                        </button>
                
                        <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                            <button type="button"
                                    wire:click="switchView('usuarios')"
                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Reporte de usuarios
                            </button>
                            <button type="button"
                                    wire:click="switchView('delitos')"
                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-gray-200 border-x md:border-x-0 md:border-t md:border-b hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                Reporte de delitos
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5">
            <div class="content">
                @if($currentView == 'usuarios')
                    <div wire:transition class="px-16 md:px-12">
                        <livewire:Usuarios-table/>
                    </div>
                @endif
                @if($currentView == 'delitos')
                    <div wire:transition class="px-16 md:px-12">
                        <livewire:Delitos-table/>
                    </div>
                @endif
            </div>
        </section>
    </div>
</div>

