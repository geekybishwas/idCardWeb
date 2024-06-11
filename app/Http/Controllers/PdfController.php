<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf($id)

    {

        $idCard = IdCard::findOrFail($id);


        // Set font path configuration

        $fontPath = storage_path('fonts/poppins_100_italic_fd3879eb3805cf18affce1af234451a5.ufm');


        // Load the PDF view with the font path

        $pdf = PDF::loadView('IdCard.print', compact('idCard'))->setOptions(['font_path' => $fontPath]);


        return $pdf->download($idCard->name . '.pdf');

    }
}
