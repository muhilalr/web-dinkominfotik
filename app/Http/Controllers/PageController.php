<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (! $page) {
            throw new ModelNotFoundException;
        }

        $sidebarMenu = Menu::where('id_page', $page->id)
            ->where('tipe', 'page')
            ->first();

        $sidebarChildren = collect();
        $sidebarTitle = null;

        if ($sidebarMenu && $sidebarMenu->parent) {
            $sidebarTitle = $sidebarMenu->parent->judul;
            $sidebarChildren = $sidebarMenu->parent->children()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->with('page')
                ->get();
        }

        return view('pages.show', [
            'page' => $page,
            'sidebarTitle' => $sidebarTitle,
            'sidebarChildren' => $sidebarChildren,
            'currentMenuId' => $sidebarMenu?->id,
        ]);
    }
}
