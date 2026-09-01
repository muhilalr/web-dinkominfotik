<x-app-layout>
  <!-- HERO HEADER START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <!-- Grid pattern background decoration -->
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="posts-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#posts-grid)" />
      </svg>
    </div>

    <div class="container relative z-10 mx-auto px-4 md:px-12">
      <!-- Breadcrumb Navigation -->
      <nav
        class="mb-4 flex items-center gap-2 overflow-x-auto whitespace-nowrap pb-1 text-xs font-medium uppercase tracking-wider text-blue-100/80">
        <a href="{{ url('/') }}" class="flex shrink-0 items-center gap-1 transition-colors hover:text-white">
          <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          Beranda
        </a>
        <span class="text-blue-200/50">&sol;</span>
        <span class="truncate font-semibold text-white">{{ $title }}</span>
      </nav>

      <div class="max-w-3xl">
        <h1 class="mb-3 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          {{ $title }}
        </h1>
        <p class="text-sm leading-relaxed text-blue-100/90 md:text-base">
          {{ $description }}
        </p>
      </div>
    </div>
  </section>
  <!-- HERO HEADER END -->

  <!-- CONTENT SECTION START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    <!-- FILTER BAR & SEARCH -->
    <div
      class="shadow-xs mb-8 flex flex-col items-stretch justify-between gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 md:flex-row md:items-center md:p-6">
      <!-- Category Filter Pills -->
      <div class="flex flex-wrap items-center gap-2">
        @php
          $baseUrl = route($tipe === 'berita' ? 'posts.berita' : 'posts.artikel');
        @endphp

        <a href="{{ request()->fullUrlWithQuery(['kategori' => null]) }}"
          class="{{ empty($currentKategori) ? 'bg-utama text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }} rounded-xl px-4 py-2 text-xs font-semibold transition-all">
          Semua
        </a>

        @foreach ($kategoris as $kategori)
          <a href="{{ request()->fullUrlWithQuery(['kategori' => $kategori->slug]) }}"
            class="{{ $currentKategori === $kategori->slug ? 'bg-utama text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }} rounded-xl px-4 py-2 text-xs font-semibold transition-all">
            {{ $kategori->nama }}
          </a>
        @endforeach
      </div>

      <!-- Search Input -->
      <form action="{{ $baseUrl }}" method="GET" class="relative min-w-60 md:w-72">
        @if ($currentKategori)
          <input type="hidden" name="kategori" value="{{ $currentKategori }}">
        @endif
        <div class="relative flex items-center">
          <input type="text" name="q" value="{{ $search }}"
            placeholder="Cari {{ strtolower($title) }}..."
            class="focus:outline-hidden w-full rounded-xl border border-slate-200 bg-slate-50 py-2.5 pl-4 pr-10 text-xs text-slate-700 transition-colors focus:border-blue-500 focus:bg-white" />
          <button type="submit" class="absolute right-3 text-slate-400 hover:text-slate-600">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
        </div>
      </form>
    </div>

    <!-- POSTS GRID -->
    @if ($posts->count() > 0)
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
          <article
            class="shadow-xs flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <!-- Thumbnail -->
            <div class="relative aspect-video w-full overflow-hidden bg-slate-100">
              @if ($post->thumbnail)
                <img
                  src="{{ Str::startsWith($post->thumbnail, ['http://', 'https://']) ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                  alt="{{ $post->judul }}"
                  class="h-full w-full object-cover transition-transform duration-500 hover:scale-105" />
              @else
                <div class="flex h-full w-full items-center justify-center bg-slate-200 text-slate-400">
                  <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
              @endif

              <!-- Badge Kategori -->
              @if ($post->kategori)
                <span
                  class="bg-utama/90 backdrop-blur-xs absolute left-3 top-3 rounded-lg px-2.5 py-1 text-[11px] font-semibold text-white">
                  {{ $post->kategori->nama }}
                </span>
              @endif
            </div>

            <!-- Content -->
            <div class="flex flex-1 flex-col p-5">
              <!-- Meta Info -->
              <div class="mb-2 flex items-center gap-3 text-[11px] text-slate-400">
                <span class="flex items-center gap-1">
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : $post->created_at->translatedFormat('d M Y') }}
                </span>
                <span>&bull;</span>
                <span class="flex items-center gap-1">
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  {{ number_format($post->views) }} views
                </span>
              </div>

              <!-- Title -->
              <h3 class="mb-2 line-clamp-2 text-base font-bold text-slate-800 hover:text-blue-600">
                <a href="{{ route('posts.show', ['tipe' => $post->tipe, 'slug' => $post->slug]) }}">
                  {{ $post->judul }}
                </a>
              </h3>

              <!-- Excerpt -->
              <p class="mb-4 line-clamp-3 text-xs leading-relaxed text-slate-500">
                {{ Str::limit(strip_tags($post->konten), 120) }}
              </p>

              <!-- Footer/Link -->
              <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-3">
                <span class="text-[11px] font-medium text-slate-400">Dinkominfotik Bangka</span>
                <a href="{{ route('posts.show', ['tipe' => $post->tipe, 'slug' => $post->slug]) }}"
                  class="text-utama inline-flex items-center gap-1 text-xs font-bold transition-colors hover:text-blue-900">
                  Baca Selengkapnya
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-10">
        {{ $posts->links() }}
      </div>
    @else
      <div
        class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
        <div class="mb-4 rounded-full bg-slate-100 p-4 text-slate-400">
          <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-slate-800">Tidak ada {{ strtolower($title) }} ditemukan</h3>
        <p class="mt-1 text-xs text-slate-500">Coba ubah kata kunci pencarian atau pilih kategori lain.</p>
        @if ($search || $currentKategori)
          <a href="{{ $baseUrl }}"
            class="bg-utama mt-4 inline-flex items-center rounded-xl px-4 py-2 text-xs font-semibold text-white">
            Reset Filter
          </a>
        @endif
      </div>
    @endif
  </section>
  <!-- CONTENT SECTION END -->
</x-app-layout>
