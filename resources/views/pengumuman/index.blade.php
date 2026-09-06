<x-app-layout>
  <!-- HERO SECTION START -->
  <section class="bg-utama relative overflow-hidden pb-16 pt-28 text-white lg:pb-20 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="pengumuman-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#pengumuman-grid)" />
      </svg>
    </div>

    <div class="container relative z-10 mx-auto px-4 md:px-12">
      <!-- Breadcrumb -->
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
        <span class="truncate font-semibold text-white">Pengumuman</span>
      </nav>

      <div class="flex flex-col justify-between gap-6 lg:flex-row lg:items-end">
        <div class="max-w-2xl">
          <div
            class="backdrop-blur-xs mb-3 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold">
            <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
            Pusat Informasi Resmi
          </div>
          <h1 class="mb-3 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
            Pengumuman Resmi
          </h1>
          <p class="text-sm leading-relaxed text-blue-100/90 md:text-base">
            Informasi terkini, edaran resmi, dan pengumuman publik dari Pemerintah Kabupaten Bangka.
          </p>
        </div>

        <!-- Search Bar -->
        <div class="w-full max-w-md">
          <form action="{{ route('pengumuman.index') }}" method="GET" class="relative">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pengumuman..."
              class="w-full rounded-xl border border-white/20 bg-white/10 py-3 pl-11 pr-24 text-sm text-white placeholder-blue-200/60 backdrop-blur-md transition-all focus:border-white focus:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/20" />
            <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-blue-200/70"
              fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <button type="submit"
              class="bg-utama hover:bg-utama/90 absolute right-1.5 top-1/2 -translate-y-1/2 rounded-lg border border-white/20 px-3.5 py-1.5 text-xs font-semibold text-white transition-colors">
              Cari
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- HERO SECTION END -->

  <!-- LISTING SECTION START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    @if (request('search'))
      <div
        class="mb-6 flex flex-wrap items-center justify-between gap-3 rounded-xl border border-blue-100 bg-blue-50/60 p-4 text-sm text-slate-700">
        <div>
          Hasil pencarian untuk: <strong class="text-utama font-bold">"{{ request('search') }}"</strong>
          <span class="text-xs text-slate-500">({{ $pengumumans->total() }} pengumuman ditemukan)</span>
        </div>
        <a href="{{ route('pengumuman.index') }}" class="text-xs font-bold text-red-600 hover:underline">
          &times; Hapus Filter Pencarian
        </a>
      </div>
    @endif

    @if ($pengumumans->count() > 0)
      <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:px-8 lg:grid-cols-3">
        @foreach ($pengumumans as $item)
          <article
            class="shadow-xs group flex flex-col overflow-hidden rounded-2xl border border-slate-200/80 bg-white transition-all duration-300 hover:-translate-y-1 hover:border-blue-300 hover:shadow-md">

            @if ($item->gambar)
              <div class="aspect-16/10 relative w-full overflow-hidden bg-slate-100">
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                  class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute left-3 top-3">
                  <span
                    class="bg-utama/90 backdrop-blur-xs rounded-lg px-2.5 py-1 text-[11px] font-bold text-white shadow-sm">
                    Pengumuman
                  </span>
                </div>
              </div>
            @else
              <div
                class="aspect-16/6 bg-linear-to-br relative flex w-full items-center justify-center from-slate-100 to-blue-50/50 p-4 text-slate-400">
                <div class="flex items-center gap-2">
                  <svg class="text-utama/60 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                  </svg>
                  <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Pemberitahuan Resmi</span>
                </div>
              </div>
            @endif

            <div class="flex flex-1 flex-col p-6">
              <div class="mb-3 flex items-center gap-2 text-[11px] font-medium text-slate-400">
                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ $item->published_at?->translatedFormat('d F Y') ?? $item->created_at->translatedFormat('d F Y') }}</span>
              </div>

              <h2 class="group-hover:text-utama mb-3 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
                <a href="{{ route('pengumuman.show', $item->slug) }}">
                  {{ $item->judul }}
                </a>
              </h2>

              <p class="mb-5 line-clamp-3 text-xs leading-relaxed text-slate-600">
                {!! Str::limit(strip_tags($item->konten), 160) !!}
              </p>

              <div class="mt-auto flex items-center justify-between border-t border-slate-100 pt-4">
                <span class="text-[11px] font-medium text-slate-400">Dinkominfotik</span>
                <a href="{{ route('pengumuman.show', $item->slug) }}"
                  class="text-utama inline-flex items-center gap-1.5 text-xs font-bold transition-transform duration-200 group-hover:translate-x-1">
                  Baca Detail
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

      <div class="mt-10">
        {{ $pengumumans->links() }}
      </div>
    @else
      <div
        class="shadow-xs flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
        <div class="text-utama mb-4 rounded-full bg-blue-50 p-4">
          <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-slate-800">Tidak Ada Pengumuman Ditemukan</h3>
        <p class="mt-1 text-xs text-slate-500">
          @if (request('search'))
            Tidak ditemukan pengumuman dengan kata kunci "{{ request('search') }}". Coba cari kata kunci lain.
          @else
            Saat ini belum ada pengumuman yang dipublikasikan.
          @endif
        </p>
        @if (request('search'))
          <a href="{{ route('pengumuman.index') }}"
            class="bg-utama mt-4 inline-flex items-center gap-1.5 rounded-lg px-4 py-2 text-xs font-bold text-white transition-colors hover:bg-blue-700">
            Lihat Semua Pengumuman
          </a>
        @endif
      </div>
    @endif
  </section>
  <!-- LISTING SECTION END -->
</x-app-layout>
