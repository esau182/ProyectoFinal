  <div>
      <div class="site-section">
          <div class="container">
              <div class="row justify-content-center text-center">
                  <div class="col-md-10">
                      <div class="heading-39101 mb-5 position-relative">
                          <span class="backdrop text-center" style="font-size: 6em; font-weight: bold; color: rgba(0, 0, 0, 0.1); position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: -1;">
                              EMERGENCIA
                          </span>
                          <h3 style="color: #000; font-weight: 600; font-size: 1.75em; margin-top: 10px;">
                              Sección destinada para ingresar tus contactos de emergencia
                          </h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    <section class="my-5">
        <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
          <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 md:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
              <button type="button"
                        wire:click="switchView('create')"
                        class="inline-flex items-center h-9 px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                <svg class="h-3.5 w-3.5 mr-2 -ml-1" fill="white" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                </svg>
                Agregar contacto de emergencia
              </button>
      
              <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                <button type="button"
                        wire:click="switchView('show')"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                  Mis contactos
                </button>
                <button type="button"
                        wire:click="switchView('config')"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-gray-200 border-x md:border-x-0 md:border-t md:border-b hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                  Configurar mi cuenta
                </button>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="pt-5">
        <div class="content">
            @if($currentView == 'create')
                <div wire:transition>
                    <livewire:CreateContacto/>
                </div>
            @endif
            @if($currentView == 'show')
            <div wire:transition>
                <livewire:Contactos-table/>
            </div>
            @endif
            @if($currentView == 'config')
              <div wire:transition>
                  <livewire:ConfigProfile/>
              </div>
            @endif
        </div>
    </section>
</div>


