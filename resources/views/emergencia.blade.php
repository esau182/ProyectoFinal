<x-layout title="Perfil">
    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" style="background-image: url('{{ asset('img/gdl-1.jpg') }}');">
        <div class="container h-100">
          <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-8 text-center" data-aos="fade-right">
              <h1 class="mb-3" style="color: #ADD8E6">SafeGDL</h1>
              <p style="font-size: 16px; color: #F5F5F5; line-height: 2.3;">
                En éste apartado podrás llegar a ingresar un contacto de emergencia para tu cuidado. De igual forma, podrás obtener configuraciones de usuario básicas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section py-5">
      <livewire:ContactoManager />
    </div>
</x-layout>

  