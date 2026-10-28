<?php

namespace App\Http\Controllers;

use App\Exports\KasusExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function kasus()
    {
        return Excel::download(
            new KasusExport,
            'laporan-data-kasus.xlsx'
        );
    }
}