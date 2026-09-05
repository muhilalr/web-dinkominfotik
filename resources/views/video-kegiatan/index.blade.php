<x-app-layout>
  <!-- HERO HEADER START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="video-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#video-grid)" />
      </svg>
    </div>

    <div class="container relative z-10 mx-auto px-4 md:px-12">
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
        <span class="truncate font-semibold text-white">Video Kegiatan</span>
      </nav>

      <div class="max-w-3xl">
        <h1 class="mb-3 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          Video Kegiatan & Publikasi
        </h1>
        <p class="text-sm leading-relaxed text-blue-100/90 md:text-base">
          Dokumentasi video kegiatan dan publikasi Pemerintah Kabupaten Bangka.
        </p>
      </div>
    </div>
  </section>
  <!-- HERO HEADER END -->

  <!-- CONTENT SECTION START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    <!-- SEARCH BAR -->
    <div
      class="shadow-xs mb-8 flex items-center justify-end gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 md:p-6">
      <form action="{{ route('video-kegiatan.index') }}" method="GET" class="relative w-full md:w-72">
        <div class="relative flex items-center">
          <input type="text" name="q" value="{{ $search }}" placeholder="Cari video kegiatan..."
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

    <!-- VIDEO GRID -->
    @if ($videoKegiatans->count() > 0)
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($videoKegiatans as $video)
          <article
            class="shadow-xs flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
            <!-- Thumbnail with Play Button -->
            <div class="relative aspect-video w-full overflow-hidden bg-slate-900">
              <img
                src="{{ $video->youtube_thumbnail_url }}"
                alt="{{ $video->judul }}"
                class="h-full w-full object-cover opacity-90 transition-transform duration-500 hover:scale-105" />

              <a href="{{ route('video-kegiatan.show', $video->slug) }}"
                class="absolute inset-0 flex items-center justify-center">
                <div
                  class="bg-utama/90 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg transition-transform hover:scale-110">
                  <svg class="ml-0.5 h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                  </svg>
                </div>
              </a>
            </div>

            <!-- Content -->
            <div class="flex flex-1 flex-col p-5">
              <!-- Meta Info -->
              <div class="mb-2 flex items-center gap-1 text-[11px] text-slate-400">
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $video->created_at->translatedFormat('d M Y') }}
              </div>

              <!-- Title -->
              <h3 class="mb-2 line-clamp-2 text-base font-bold text-slate-800 hover:text-blue-600">
                <a href="{{ route('video-kegiatan.show', $video->slug) }}">
                  {{ $video->judul }}
                </a>
              </h3>

              @if ($video->deskripsi)
                <p class="mb-4 line-clamp-2 text-xs text-slate-500">
                  {{ $video->deskripsi }}
                </p>
              @endif

              <!-- Footer -->
              <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-3">
                <span class="text-[11px] font-medium text-slate-400">Dinkominfotik Bangka</span>
                <a href="{{ route('video-kegiatan.show', $video->slug) }}"
                  class="text-utama inline-flex items-center gap-1 text-xs font-bold transition-colors hover:text-blue-900">
                  Tonton Video
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          </article>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-10">
        {{ $videoKegiatans->links() }}
      </div>
    @else
      <div
        class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
        <div class="mb-4 rounded-full bg-slate-100 p-4 text-slate-400">
          <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-slate-800">Tidak ada video kegiatan ditemukan</h3>
        <p class="mt-1 text-xs text-slate-500">Coba ubah kata kunci pencarian atau kembali lagi nanti.</p>
        @if ($search)
          <a href="{{ route('video-kegiatan.index') }}"
            class="bg-utama mt-4 inline-flex items-center rounded-xl px-4 py-2 text-xs font-semibold text-white">
            Reset Pencarian
          </a>
        @endif
      </div>
    @endif
  </section>
  <!-- CONTENT SECTION END -->
</x-app-layout>
