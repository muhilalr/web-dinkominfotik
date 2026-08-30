<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['judul', 'tipe', 'id_page', 'url', 'route_name', 'parent_id', 'sort_order', 'is_active'])]
class Menu extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Menu $menu) {
            match ($menu->tipe) {
                'page' => $menu->fill(['url' => null, 'route_name' => null]),
                'url' => $menu->fill(['id_page' => null, 'route_name' => null]),
                'route' => $menu->fill(['id_page' => null, 'url' => null]),
            };
        });
    }

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'id_page');
    }

    public function getUrl(): string
    {
        return match ($this->tipe) {
            'page' => url('/page/'.$this->page?->slug),
            'url' => $this->url ?? '#',
            'route' => filled($this->route_name) ? route($this->route_name) : '#',
            default => '#',
        };
    }
}
