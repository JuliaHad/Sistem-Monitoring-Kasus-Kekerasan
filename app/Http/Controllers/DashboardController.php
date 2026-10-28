<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Kasus::count();

        $hariIni = Kasus::whereDate(
            'created_at',
            today()
        )->count();

        return view(
            'dashboard',
            compact(
                'total',
                'hariIni'
            )
        );
    }
}