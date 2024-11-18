@props(['delito'])
<a href="https://maps.google.com/?q={{ $delito->latitud }},{{ $delito->longitud }}" target="on_blank">
    <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">{{ $delito->latitud }} / {{ $delito->longitud }}</span>
</a>
