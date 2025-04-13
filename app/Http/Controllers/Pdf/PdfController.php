<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    //Metodo pdf clientes
    public function clientes(Request $request){

        set_time_limit(0);

        // Obtener la fecha de proceso (por ejemplo, la fecha actual)
        $fechaProceso = date('Y-m-d');

        // Obtener los datos para el PDF
        $entities = Cliente::orderBy('id')->get();

        // Pasar los datos a la vista
        $pdfView = view('pdf.clientes.index', compact('entities', 'fechaProceso'));

        // Generar el PDF
        $pdf = \PDF::loadHtml($pdfView->render());
        $pdf->setPaper('letter', 'portrait');

        // Descargar el PDF en lugar de mostrarlo
        return $pdf->stream('Listado_de_clientes.pdf', ['Attachment' => 0]);
    }
}
