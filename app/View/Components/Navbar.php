<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Navbar extends Component
{
    public Collection $menus;

    public function __construct()
    {
        $this->menus = Menu::query()
            ->with(['children' => fn ($q) => $q
                ->where('is_active', true)
                ->orderBy('sort_order')])
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
