<?php

namespace App\Http\Controllers;

use App\Models\BankData;
use Illuminate\Http\Request;

class BankDataController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');
        $tahun = $request->query('tahun');

        $query = BankData::where('is_published', true)
            ->with('lampiranBankData')
            ->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        $bankDatas = $query->paginate(12)->withQueryString();
        $availableYears = BankData::where('is_published', true)
            ->whereNotNull('tahun')
            ->distinct()
            ->pluck('tahun')
            ->sort()
            ->values();

        return view('bank-data.index', [
            'bankDatas' => $bankDatas,
            'availableYears' => $availableYears,
            'search' => $search,
            'currentTahun' => $tahun,
        ]);
    }
}
