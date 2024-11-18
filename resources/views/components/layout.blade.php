  <!doctype html>
  <html lang="en">

  <head>
    <title>{{ $title }}</title>

    <link rel="icon" href="{{ asset('img/logod.png') }}" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- API mapa para consulta  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- SEARCH BAR PLUGIN -->
    <script src="https://cdn.maptiler.com/maptiler-geocoding-control/v1.3.3/leaflet.umd.js"></script>
    <link href="https://cdn.maptiler.com/maptiler-geocoding-control/v1.3.3/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <!-- RUTAS  -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('head')
    @toastifyCss
    @livewireStyles

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <x-toaster-hub />

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div style="padding-left: 200px; padding-right: 200px;">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="{{ route('bienvenida') }}">
                  <img src="{{asset('img/Logod.png')}}" alt="Image" class="img-fluid">
                </a>
              </div>
            </div>

            <div class="col-9  text-right">


              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>



            <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <li class="active"><a href="{{ route('bienvenida') }}" wire:navigate class="nav-link">Inicio</a></li>
                <li class="active"><a href="{{ route('mapa') }}" class="nav-link">Mapa</a></li>
                @if(Auth::user())
                <li><a href="{{ route('delito.create') }}" class="nav-link">Reportar</a></li>
                @endif
                <li><a href="{{ route('contacto') }}" wire:navigate class="nav-link">Contacto</a></li>
                @if(Auth::user())
                  <li><a href="{{ route('delito.index') }}" wire:navigate class="nav-link">Mis delitos</a></li>
                  <li><a href="{{ url('/Contacto-de-Emergencia') }}" wire:navigate class="nav-link">Contactos de Emergencia</a></li>
                @endif
              </ul>

            </nav>
            @if(Auth::user())
            <a href="#" id="share-button" class="location-icon" title="Compartir ubicación con contacto de emergencia">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-house">
                <path d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z" />
                <path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2" />
                <path d="M18 22v-3" />
                <circle cx="10" cy="10" r="3" />
              </svg>
            </a>
            @endif

              <a href="tel:911" id="panic-button" class="emergency-icon" title="Llamar al 911">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone-call">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  <path d="M14.05 2a9 9 0 0 1 8 7.94" />
                  <path d="M14.05 6A5 5 0 0 1 18 10" />
                </svg>
              </a>



              <a href="#" id="perfil-icon" style="color: red;">
                <i class="fas fa-user fa-2x"></i>
              </a>


            <div id="menu-opciones" class="oculto">
              <ul>
                @if(Auth::check())
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
                @else
                <li><a href="{{ route('register') }}"><i class="fas fa-user"></i> Registrarse</a></li>
                <li><a href="{{ route('login') }}"><i class="fas fa-user"></i> Iniciar sesión</a></li>
                @endif
              </ul>
            </div>


            </div>
          </div>

      </header>


      {{$slot}}


      <div class="ftco-blocks-cover-1">
        <div class="container">
          <div class="mb-3 row align-items-center">

          </div>
        </div>
      </div>



    <footer class="site-footer">
      <div class="container">
        <div class="col-lg-3">
          <h2 class="footer-heading">Derechos de uso</h2>
          <ul>
            <li>Mapa generado mediante la librería <a href="https://leafletjs.com/" target="_blank">Leaflet</a></li>
            <li>Tipo de mapa cargado mediante la API de <a href="https://www.openstreetmap.org/#map=4/17.48/-92.55" target="_blank">OpenStreetMap</a></li>
          </ul>
        </div>

        <div class="col-lg-3">
          <h2 class="footer-heading">Enlaces rápidos</h2>
          <ul>
            <li><a href="{{ route('bienvenida') }}" wire:navigate>Inicio</a></li>
            <li><a href="{{ route('mapa') }}">Mapa</a></li>
            @if(Auth::user())
            <li><a href="{{ route('delito.index') }}" wire:navigate>Mis delitos</a></li>
            <li><a href="{{ route('delito.create') }}">Reportar</a></li>
            @endif
            <li><a href="#">Contacto</a></li>
          </ul>
        </div>

        <div class="col-lg-3">
          <h2 class="footer-heading">Redes sociales</h2>
          <p>Para notificaciones y demás información relacionada con la aplicación, te recomendamos seguirnos en nuestras redes.</p>
          <div class="social-icons">
            <a href="#"><img src="{{ asset('img/instagram_icon.png') }}" alt="Instagram"></a>
            <a href="#"><img src="{{ asset('img/twitter_icon.png') }}" alt="Twitter"></a>
            <a href="#"><img src="{{ asset('img/tiktok_icon.png') }}" alt="TikTok"></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <hr>
        <p>&copy; 2024 SafeGDL. All rights reserved.</p>
      </div>
    </footer>

  </div>
  <!-- Modal para seleccionar contacto -->
<div id="contactModal" class="modal">
    <div class="modal-content">
        <span id="closeModal" class="close">&times;</span>
        <h3>Selecciona un contacto para enviar la ubicación:</h3>
        <div id="contactList">
            <!-- Los botones de contacto se generarán dinámicamente aquí -->
        </div>
    </div>
</div>



    <script>
      -
      document.getElementById('perfil-icon').addEventListener('click', function(event) {
        event.preventDefault();
        const menu = document.getElementById('menu-opciones');
        menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
      });

      document.addEventListener('click', function(event) {
        const menu = document.getElementById('menu-opciones');
        const icon = document.getElementById('perfil-icon');
        if (menu.style.display === 'block' && !menu.contains(event.target) && !icon.contains(event.target)) {
          menu.style.display = 'none';
        }
      });
    </script>
  @auth
  <script>
      document.getElementById('share-button').addEventListener('click', function(event) {
          event.preventDefault();

          // Verifica si el navegador soporta la API de geolocalización
          if ('geolocation' in navigator) {
              navigator.geolocation.getCurrentPosition(function(position) {
                  const latitude = position.coords.latitude;
                  const longitude = position.coords.longitude;

                  // Contactos de emergencia del usuario
                  const contactos = @json(Auth::user()->contactos);

                  if (contactos.length === 0) {
                      alert("No tienes contactos de emergencia registrados.");
                      return;
                  }

                  // Abre el modal y genera botones para cada contacto
                  const modal = document.getElementById("contactModal");
                  const contactList = document.getElementById("contactList");
                  contactList.innerHTML = ''; // Limpia la lista de contactos

                  contactos.forEach((contacto) => {
                      const button = document.createElement("button");
                      button.className = "contact-button";
                      button.textContent = contacto.numero;
                      button.addEventListener("click", function() {
                          const numero = contacto.numero;
                          const message = encodeURIComponent(`Aquí está mi ubicación: https://www.google.com/maps?q=${latitude},${longitude}`);
                          window.open(`https://wa.me/${numero}?text=${message}`, '_blank');
                          modal.style.display = "none"; // Cierra el modal
                      });
                      contactList.appendChild(button);
                  });

                  // Muestra el modal
                  modal.style.display = "block";
              }, function(error) {
                  alert('No se pudo obtener la ubicación: ' + error.message);
              });
          } else {
              alert('La geolocalización no está soportada en este navegador.');
          }
      });

      
      document.getElementById("closeModal").onclick = function() {
          document.getElementById("contactModal").style.display = "none";
      };
      window.onclick = function(event) {
          const modal = document.getElementById("contactModal");
          if (event.target == modal) {
              modal.style.display = "none";
          }
      };
  </script>
  @endauth

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @livewireScripts
    @toastifyJs
    @stack('scripts')
  </body>

  </html>