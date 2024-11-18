<x-layout title="Bienvenida">

<div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('{{ asset('img/gdl-1.jpg') }}');">
        <div class="container h-100">
          <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-8 text-center" data-aos="fade-right">
              <h1 class="mb-3" style="color: #ADD8E6">SafeGDL</h1>
              <p style="font-size: 16px; color: #F5F5F5; line-height: 2.3;">
                Encuentra la mejor ruta para llegar a tu destino con confianza. SafeGDL te guía por caminos más seguros y protegidos, evitando áreas de riesgo para que tu experiencia de viaje sea tranquila y sin preocupaciones.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-md-10">
        <div class="heading-39101 mb-5">
          <span class="backdrop text-center">Funciones</span>
          <span class="subtitle-39191">‎ </span>
          <h3 class="main-title">Algunas funciones de la aplicación</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="person-29191 text-center">
          <img src="{{asset('img/Mapafun.jpeg')}}" alt="Image" class="img-fluid mb-3 custom-img">
          <div class="px-3">
            <h2 class="mb-2">Calcular rutas</h2>
            <p class="caption mb-3">Mapa</p>
            <p>
              Podrás hacer el <a href="#">cálculo de rutas seguras</a> y rápidas mediante la información que tenemos en nuestra base de datos.
              Queremos ser tu herramienta de viaje preferida.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="person-29191 text-center">
          <img src="{{asset('img/reportar.jpg')}}" alt="Image" class="img-fluid mb-3 custom-img">
          <div class="px-3">
            <h2 class="mb-2">Reportar delitos</h2>
            <p class="caption mb-3">Queremos Escucharte</p>
            <p>
              Contamos con un apartado de <a href="#">reporte de delitos</a> donde buscamos que todos aquellos incidentes que te han pasado no queden olvidados;
              ayuda a otras personas a poder tener cuidado acerca de su seguridad.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="person-29191 text-center">
          <img src="{{asset('img/llamada.jpeg')}}" alt="Image" class="img-fluid mb-3 custom-img">
          <div class="px-3">
            <h2 class="mb-2">Llamada de emergencia</h2>
            <p class="caption mb-3">Seguridad</p>
            <p>
              Implementamos dentro de la aplicación un <a href="#">botón especial</a> para aquellos momentos donde consideres que tu seguridad está comprometida.
              Úsalo sin coste alguno y de forma accesible.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


 <div class="site-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="heading-39101 mb-5 position-relative">
          <span class="backdrop">OBJETIVOS</span>
          <h3 class="main-title">Nuestro objetivo</h3>
        </div>
        <p>
          La idea para esta aplicación es generar una serie de rutas seguras dentro de la zona de
          Guadalajara, donde dichas rutas son hechas considerando una serie de reportes (delitos)
          que los propios usuarios de la aplicación realizan al momento de interactuar con la aplicación.
        </p>
        <p>
          Nuestro principal objetivo es darle una solución social al problema de la inseguridad, siendo 
          nosotros un medio con el cual aquellas personas afectadas tengan un espacio para poder hacer 
          conocer sus problemas de inseguridad dentro de su vida diaria como en sus comunidades, además de ser una herramienta
          enfocada en poder darle a la ciudadanía de Guadalajara una forma de tránsito seguro mediante un mapa web.
        </p>
      </div>
      <div class="col-md-6" data-aos="fade-right">
        <img src="{{asset('img/historia.jpg')}}" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>


<div class="site-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 order-2 ml-auto">
        <div class="heading-39101 mb-5 position-relative">
          <span class="backdrop">PROPUESTA</span>
          <h3 class="main-title">Propuesta</h3>
        </div>
        <p>
          Nuestra idea es mejorar la seguridad en las ciudades, proporcionando a los usuarios
          rutas más seguras que les permitan evitar zonas con altos índices de criminalidad.
          Utilizando datos de delitos reportados, buscamos ofrecer una herramienta accesible que
          facilite la toma de decisiones informadas.
        </p>
        <p>
          Queremos aprovechar la tecnología para generar un impacto positivo en la vida cotidiana
          de las personas, promoviendo una movilidad más consciente y contribuyendo al bienestar
          general de las comunidades. Nuestra meta es ayudar a crear entornos más seguros para todos.
        </p>
      </div>
      <div class="col-md-6 order-1" data-aos="fade-left">
        <img src="{{asset('img/propuesta.jpeg')}}" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>



  
  </div>

  <div class="site-section bg-image overlay" style="background-image: url({{asset('img/minerva.jpg')}})">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="font-weight-bold text-white">Unete a nuestra plataforma</h2>
          <p class="text-white">
            Es completamente gratis y puedes disfrutar de mas funciones como reportar delitos,
            o agregar un contacto para que le puedas enviar tu ubicación si te sientes incomodo
          </p>
          <p class="mb-0"><a href="{{route('register')}}" class="btn btn-primary text-white py-3 px-4">Unirse</a></p>
        </div>
      </div>
    </div>
  </div>

</x-layout>