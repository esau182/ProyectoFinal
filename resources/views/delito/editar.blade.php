<x-layout title="formulario delito">
    <div class="site-section container p-4 bg-light rounded shadow">
        <div class="col-md-8 blog-content mx-auto">
            <h1 class="mb-4 text-center text-primary font-weight-bold" style="font-size: 2.5rem; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);">
                Reportar Delito
            </h1>
            <form action="{{ route('delito.update',$delito) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group mb-4">
                    <label for="tipoDelito" class="font-weight-bold">¿Qué tipo de delito fue?</label>
                    <select class="form-control border-primary" id="tipoDelito" name="tipoDelito">
                        <option value="" disabled>Selecciona el tipo de delito</option>
                        <option value="Robo" {{ (old('tipoDelito') ?? $delito->tipoDelito) == 'Robo' ? 'selected' : '' }}>Robo</option>
                        <option value="Asalto" {{ (old('tipoDelito') ?? $delito->tipoDelito) == 'Asalto' ? 'selected' : '' }}>Asalto</option>
                        <option value="Vandalismo" {{ (old('tipoDelito') ?? $delito->tipoDelito) == 'Vandalismo' ? 'selected' : '' }}>Vandalismo</option>
                        <option value="Fraude" {{ (old('tipoDelito') ?? $delito->tipoDelito) == 'Fraude' ? 'selected' : '' }}>Fraude</option>
                        <option value="Acoso" {{ (old('tipoDelito') ?? $delito->tipoDelito) == 'Acoso' ? 'selected' : '' }}>Acoso</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label for="fecha" class="font-weight-bold">Fecha y hora aproximada</label>
                    <input type="datetime-local" id="fecha" name="fecha" class="form-control border-primary" value="{{ old('fecha') ?? $delito->fecha}}">
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
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control border-primary" style="resize: none; overflow-y: auto;">{{old('descripcion') ?? $delito->descripcion}}</textarea>
                </div>


                <div class="text-center">
                    <input type="submit" value="Reportar" class="btn btn-primary btn-md text-dark px-5">
                </div>
            </form>
        </div>
    </div>
</x-layout>

<script>
    const delitoLatitud = {{ $delito->latitud ?? 'null' }};
    const delitoLongitud = {{ $delito->longitud ?? 'null' }};
</script>


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