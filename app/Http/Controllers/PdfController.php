<?php

namespace App\Http\Controllers;

use App\Models\IdCard;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf($id){
        $idCard=IdCard::findOrFail($id);
        $pdf=Pdf::loadView('IdCard.print',compact('idCard'));
        return $pdf->download($idCard->name .'.pdf');
    }
}
