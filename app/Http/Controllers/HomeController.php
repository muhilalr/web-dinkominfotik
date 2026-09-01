<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headline = Post::where('is_headline', true)
            ->where('is_published', true)
            ->with('kategori')
            ->latest('published_at')
            ->first()
            ?? Post::where('is_published', true)
            ->with('kategori')
            ->latest('published_at')
            ->first();

        $beritas = Post::where('tipe', 'berita')
            ->where('is_published', true)
            ->with('kategori')
            ->latest('created_at')
            ->limit(3)
            ->get();

        $artikels = Post::where('tipe', 'artikel')
            ->where('is_published', true)
            ->with('kategori')
            ->latest('created_at')
            ->limit(3)
            ->get();

        $terbaru = Post::where('is_published', true)
            ->with('kategori')
            ->latest('created_at')
            ->limit(4)
            ->get();

        $terpopuler = Post::where('is_published', true)
            ->with('kategori')
            ->orderByDesc('views')
            ->limit(4)
            ->get();

        return view('welcome', compact('headline', 'beritas', 'artikels', 'terbaru', 'terpopuler'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
