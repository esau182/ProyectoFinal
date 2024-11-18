<x-layout title="Delitos">
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" style="background-image: url('{{ asset('img/gdl-1.jpg') }}');">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-8 text-center" data-aos="fade-right">
                        <h1 class="mb-3" style="color: #ADD8E6">SafeGDL</h1>
                        <p style="font-size: 16px; color: #F5F5F5; line-height: 2.3;">
                            En éste apartado podrás interactuar directamente con todas las denuncias que tengas realizadas en tu cuenta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid testimonial py-3 p-4">
    <h1 class="mb-4 text-center text-primary font-weight-bold" style="font-size: 2.5rem; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);">
                Mis delitos
            </h1>
    </div>
    <div class="table-view-container">
        <livewire:DelitosUser-table />
    </div>
</x-layout>