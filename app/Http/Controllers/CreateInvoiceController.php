<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class CreateInvoiceController extends Controller
{
    public function index()
    {
        return view('reports.invoice');
    }
}