<?php

namespace Database\Factories;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Pengumuman>
 */
class PengumumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judul = fake()->sentence();

        return [
            'judul' => $judul,
            'slug' => Str::slug($judul),
            'konten' => fake()->paragraphs(3, true),
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}
