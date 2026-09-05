<?php

namespace App\Http\Controllers;

use App\Models\VideoKegiatan;
use Illuminate\Http\Request;

class VideoKegiatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        $query = VideoKegiatan::where('is_published', true)
            ->latest('created_at');

        if ($search) {
            $query->where('judul', 'like', "%{$search}%");
        }

        $videoKegiatans = $query->paginate(9)->withQueryString();

        return view('video-kegiatan.index', [
            'videoKegiatans' => $videoKegiatans,
            'search' => $search,
        ]);
    }

    public function show(string $slug)
    {
        $video = VideoKegiatan::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $related = VideoKegiatan::where('id', '!=', $video->id)
            ->where('is_published', true)
            ->latest('created_at')
            ->limit(3)
            ->get();

        return view('video-kegiatan.show', [
            'video' => $video,
            'related' => $related,
        ]);
    }
}
