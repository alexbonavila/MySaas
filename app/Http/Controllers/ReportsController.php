<?php

namespace App\Http\Controllers;

use App\SaleReportsDaily;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReportsController extends Controller
{
    public function dailySales()
    {
        $daily = SaleReportsDaily::all();
        $days = $daily->pluck('day');
        $totals = $daily->pluck('total');
        return view('reports.dailySales', compact("days", "totals"));
    }
}