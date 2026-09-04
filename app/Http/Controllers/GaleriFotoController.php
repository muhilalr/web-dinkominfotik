<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;

class GaleriFotoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        $query = GaleriFoto::where('is_published', true)
            ->with('foto')
            ->latest('event_date')
            ->latest('created_at');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $galeriFotos = $query->paginate(9)->withQueryString();

        return view('galeri-foto.index', [
            'galeriFotos' => $galeriFotos,
            'search' => $search,
        ]);
    }

    public function show(string $slug)
    {
        $galeri = GaleriFoto::where('slug', $slug)
            ->where('is_published', true)
            ->with('foto')
            ->firstOrFail();

        $related = GaleriFoto::where('id', '!=', $galeri->id)
            ->where('is_published', true)
            ->with('foto')
            ->latest('event_date')
            ->limit(3)
            ->get();

        return view('galeri-foto.show', [
            'galeri' => $galeri,
            'related' => $related,
        ]);
    }
}
