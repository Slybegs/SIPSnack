<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesReportDetailExport implements ShouldAutoSize, FromView
{
    public function view(): View
    {
        return view('admin.exports.sales-report-detail', [
            'transaksis' => Transaksi::whereIn('status', ['Dikirim', 'Selesai'])->get()
        ]);
    }
}
