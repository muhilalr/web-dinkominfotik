<?php

use App\Models\Pengumuman;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('pengumuman index page can be rendered', function () {
    Pengumuman::factory()->create([
        'judul' => 'Pengumuman Uji Coba',
        'slug' => 'pengumuman-uji-coba',
        'konten' => 'Isi pengumuman uji coba.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get(route('pengumuman.index'));

    $response->assertStatus(200);
    $response->assertSee('Pengumuman Uji Coba');
});

test('pengumuman show page can be rendered', function () {
    $pengumuman = Pengumuman::factory()->create([
        'judul' => 'Detail Pengumuman Uji Coba',
        'slug' => 'detail-pengumuman-uji-coba',
        'konten' => '<p>Konten detail pengumuman resmi.</p>',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $response = $this->get(route('pengumuman.show', $pengumuman->slug));

    $response->assertStatus(200);
    $response->assertSee('Detail Pengumuman Uji Coba');
    $response->assertSee('Konten detail pengumuman resmi.');
});
