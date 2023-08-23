<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{

    public function index() {
        $data = [
            'sku' => '',
            'delivery_instruction' => ''
        ];
        return view('edit_label', compact("data"));
    }

    public function generateReceipt(Request $request)
    {
        $data = [
            'sku' => $request->input('sku'),
            'delivery_instruction' => $request->input('delivery_instruction')
        ];

        $html = view('sku_label_template', compact('data'))->render();

        $pdf = $this->generatePdfFromHtml($html);

        return $pdf->stream('receipt.pdf');
    }

    private function generatePdfFromHtml($html)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf;
    }
}

