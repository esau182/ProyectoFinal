<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function exportPdf(Request $request)
    {
        $currentView = $request->get('currentView'); // Obtener vista actual
        $data = [];

        if ($currentView === 'usuarios') {
            $data['title'] = 'Reporte de Usuarios';
            $data['items'] = \App\Models\User::all();
        } elseif ($currentView === 'delitos') {
            $data['title'] = 'Reporte de Delitos';
            $data['items'] = \App\Models\Delito::all();
        } else {
            abort(404, 'Vista no encontrada');
        }

        $pdf = Pdf::loadView('exports.report', $data);
        return $pdf->download($data['title'] . '.pdf');
    }
}