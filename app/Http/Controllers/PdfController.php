<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use Spatie\PdfToImage\Pdf as PdfImage;
use Org_Heigl\Ghostscript\Ghostscript;

class PdfController extends Controller
{
    public function create()
    {
        return view('ColumnsRows.create');
    }

    public function pdfview(Request $request)
    {
        $cols = explode(',', $request->columns);
        $rows = $request->rows;
        if ($request->has('download')) {
            $col = $request->cols;
            $row = $request->row;
            $pdf = PDF::loadView('pdfview', compact('col', 'row'));
            $filename = "pdfview.pdf";
            $customPaper = array(0, 0, 360, 360);
            $pdf->setPaper($customPaper)
                ->save('generatepdf/' . $filename);

            $pathToImage = public_path() . "\pdfToImage\\mujahid%d";
            $getPdf = public_path() . "\generatepdf\\pdfview.pdf";

            Ghostscript::setGsPath("C:\Program Files\gs\gs9.53.3\bin\gswin64c.exe");

            $pdfImage = new PdfImage($getPdf);
            $pdfImage->setOutputFormat('png')->saveImage($pathToImage);
            return $pdf->download('pdfview.pdf');

        }
        if (!empty($cols && $rows)) {
            return view('ColumnsRows.index', compact('cols', 'rows'));
        }
    }

}
