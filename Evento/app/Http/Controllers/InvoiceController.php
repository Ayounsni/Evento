<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generate(Reservation $reservation){

            $pdf = Pdf::loadView('user/pdf',compact('reservation'));
        return $pdf->download('Ticket.pdf');
    }
}
