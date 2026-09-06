<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengumuman::where('is_published', true);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%'.$search.'%')
                    ->orWhere('konten', 'like', '%'.$search.'%');
            });
        }

        $pengumumans = $query
            ->latest('published_at')
            ->latest('created_at')
            ->paginate(9)
            ->withQueryString();

        return view('pengumuman.index', compact('pengumumans'));
    }

    public function show(string $slug)
    {
        $pengumuman = Pengumuman::where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $recentPengumumans = Pengumuman::where('is_published', true)
            ->where('id', '!=', $pengumuman->id)
            ->latest('published_at')
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('pengumuman.show', compact('pengumuman', 'recentPengumumans'));
    }
}
