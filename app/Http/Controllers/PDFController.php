<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PDF;\
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function generatePDF()
    {
        // $data = [
        //     'title' => 'Welcome to Nicesnippets.com',
        //     'date' => date('m/d/Y')
        // ];
        // $pdf = PDF::loadView('myPDF', $data);
        $pdf = PDF::loadView('myPDF');

        $pdf->set_option('defaultMediaType', 'all');
        $pdf->set_option('isFontSubsettingEnabled', true);

        $pdf->setPaper('a4');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2,"Multiply");

        $canvas->set_opacity(.2);

        $canvas->page_text($width/5, $height/2, 'ลายน้ำของแอม', null,
        55, array(0,0,0),2,2,-30);

        return $pdf->stream('nicesnippets.pdf');
        // return $pdf->dowload('nicesnippets.pdf');
    }
}