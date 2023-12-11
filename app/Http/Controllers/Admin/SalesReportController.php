<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\SalesReportExport;
use App\Exports\SalesReportDetailExport;
use Maatwebsite\Excel\Facades\Excel;

class SalesReportController extends Controller
{

    public function index(Request $request)
    {
        $perPage = 25;
        $transaksis = Transaksi::latest()->whereIn('status', ['Dikirim', 'Selesai'])->paginate($perPage);

        return view('admin.sales-report.index')->with(compact('transaksis'));
    }

    public function export() 
    {
        return Excel::download(new SalesReportExport, 'sales-report.xlsx');
    }

    public function exportDetail() 
    {
        return Excel::download(new SalesReportDetailExport, 'sales-report-detail.xlsx');
    }
}