<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DelitoController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('delito.bienvenida');
})->name('bienvenida');

Route::get('/contacto', function () {
    return view('delito.contacto');
})->name('contacto');

Route::get('/mapa', function () {
    return view('testing');
})->name('mapa');

Route::resource('delito', DelitoController::class);

Route::get('/route', [RouteController::class, 'getRoute']);

Route::get('/moderador', function () {
    return view('moderador');
});

Route::get('/Contacto-de-Emergencia', function () {
    return view('emergencia');
});

Route::get('/generate-geojson', [RouteController::class, 'generateGeoJson']);

Route::get('/moderador/delitos', [DelitoController::class, 'mostrarTodosLosDelitos'])->name('moderador.delitos');


Route::get('/export-pdf', [PdfController::class, 'exportPdf'])->name('export.pdf');