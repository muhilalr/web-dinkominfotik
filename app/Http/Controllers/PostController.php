<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(string $tipe, string $slug)
    {
        if (! in_array($tipe, ['berita', 'artikel'])) {
            abort(404);
        }

        $post = Post::where('tipe', $tipe)
            ->where('slug', $slug)
            ->where('is_published', true)
            ->with('kategori')
            ->first();

        if (! $post) {
            throw new ModelNotFoundException;
        }

        $post->increment('views');

        $relatedPosts = Post::where('tipe', $tipe)
            ->where('id_kategori', $post->id_kategori)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $otherPosts = Post::where('tipe', $tipe)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();

        return view('posts.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'otherPosts' => $otherPosts,
            'tipe' => $tipe,
        ]);
    }

    public function indexBerita(Request $request)
    {
        return $this->renderIndex($request, 'berita', 'Berita Terkini', 'Informasi dan berita resmi dari Dinas Komunikasi, Informatika dan Statistik Kabupaten Bangka.');
    }

    public function indexArtikel(Request $request)
    {
        return $this->renderIndex($request, 'artikel', 'Artikel', 'Wawasan, artikel teknis, dan informasi literasi digital Pemkab Bangka.');
    }

    private function renderIndex(Request $request, string $tipe, string $title, string $description)
    {
        $search = $request->query('q');
        $kategoriSlug = $request->query('kategori');

        $query = Post::where('tipe', $tipe)
            ->where('is_published', true)
            ->with('kategori')
            ->orderBy('published_at', 'desc');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('konten', 'like', "%{$search}%");
            });
        }

        if ($kategoriSlug) {
            $query->whereHas('kategori', function ($q) use ($kategoriSlug) {
                $q->where('slug', $kategoriSlug)->where('is_active', true);
            });
        }

        $posts = $query->paginate(9)->withQueryString();
        $kategoris = Kategori::where('is_active', true)->orderBy('nama')->get();

        return view('posts.index', [
            'posts' => $posts,
            'kategoris' => $kategoris,
            'tipe' => $tipe,
            'title' => $title,
            'description' => $description,
            'currentKategori' => $kategoriSlug,
            'search' => $search,
        ]);
    }
}
