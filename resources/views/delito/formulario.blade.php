<x-layout title="formulario delito">
    <div class="ftco-blocks-cover-1">
        <div class="site-section-cover overlay" style="background-image: url('{{ asset('img/gdl-1.jpg') }}');">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-8 text-center" data-aos="fade-right">
                        <h1 class="mb-3" style="color: #ADD8E6">SafeGDL</h1>
                        <p style="font-size: 16px; color: #F5F5F5; line-height: 2.3;">
                            En éste formulario podrás hacer conocer aquellos delitos los cuales te han pasado durante tu estadía en Guadalajara. 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section container p-4 bg-light rounded shadow">
        <div class="col-md-8 blog-content mx-auto">
            <h1 class="mb-4 text-center text-primary font-weight-bold" style="font-size: 2.5rem; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);">
                Reportar Delito
            </h1>
            <form action="{{ route('delito.store') }}" method="POST">
                @csrf

                <div class="form-group mb-4">
                    <label for="tipoDelito" class="font-weight-bold">¿Qué tipo de delito fue?</label>
                    <select class="form-control border-primary" id="tipoDelito" name="tipoDelito">
                        <option value="" disabled selected>Selecciona el tipo de delito</option>
                        <option value="Robo">Robo</option>
                        <option value="Asalto">Asalto</option>
                        <option value="Vandalismo">Vandalismo</option>
                        <option value="Fraude">Fraude</option>
                        <option value="Acoso">Acoso</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="fecha" class="font-weight-bold">Fecha y hora aproximada</label>
                    <input type="datetime-local" id="fecha" name="fecha" class="form-control border-primary">
                </div>

                <div class="form-group mb-4">
                    <label class="font-weight-bold">Selecciona el lugar del reporte</label>
                    <div id="mapa_reportar" class="border rounded" style="height: 400px; width: 100%;"></div>
                    <input type="hidden" name="latitud" id="latitud">
                    <input type="hidden" name="longitud" id="longitud">
                </div>

                <input type="hidden" name="latitudR" id="latitudR">
                <input type="hidden" name="longitudR" id="longitudR">

                <div class="form-group mb-4">
                    <label for="descripcion" class="font-weight-bold">Describe el delito</label>
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control border-primary" style="resize: none; overflow-y: auto;"></textarea>
                </div>


                <div class="text-center">
                    <input type="submit" value="Reportar" class="btn btn-primary btn-md text-dark px-5">
                </div>
            </form>
        </div>
    </div>
</x-layout>

<link href="https://cdn.jsdelivr.net/npm/tom-select@1.7.8/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@1.7.8/dist/js/tom-select.complete.min.js"></script>

<script>
    const select = new TomSelect("#tipoDelito", {
        create: false,
        maxOptions: 5,
        sortField: {
            field: "text",
            direction: "asc"
        },
        dropdownDirection: 'auto',
        placeholder: "Selecciona el tipo de delito"
    });

    select.on('item_add', function() {
        select.settings.placeholder = "";
        select.control_input.removeAttribute("placeholder");
    });
</script>

@push('scripts')
<script>
    const key = 'jY2HEnlUCVqLzq9kOHFe';
</script>
<script src="{{ asset('js/map.js') }}"></script>
@endpush
<script src="{{ asset('js/nodoReportado.js') }}"></script>