<x-app-layout>
  <!-- HERO SECTION START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
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
        <a href="{{ route('pengumuman.index') }}"
          class="flex shrink-0 items-center gap-1 transition-colors hover:text-white">
          Pengumuman
        </a>
        <span class="text-blue-200/50">&sol;</span>
        <span class="truncate font-semibold text-white">{{ $pengumuman->judul }}</span>
      </nav>

      <div class="max-w-4xl">
        <div
          class="backdrop-blur-xs mb-3 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold">
          <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
          Pengumuman Resmi
        </div>

        <h1 class="mb-4 text-2xl font-bold leading-tight text-white md:text-3xl lg:text-4xl">
          {{ $pengumuman->judul }}
        </h1>

        <div class="flex flex-wrap items-center gap-4 border-t border-white/10 pt-3 text-xs text-blue-100/90">
          <span class="flex items-center gap-1.5">
            <svg class="h-4 w-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ $pengumuman->published_at?->translatedFormat('d F Y') ?? $pengumuman->created_at->translatedFormat('d F Y') }}
          </span>
          <span class="flex items-center gap-1.5">
            <svg class="h-4 w-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            Dinkominfotik Kab. Bangka
          </span>
        </div>
      </div>
    </div>
  </section>
  <!-- HERO SECTION END -->

  <!-- CONTENT SECTION START -->
  <section class="container mx-auto px-4 py-8 lg:py-12" x-data="{ imageModal: false, copied: false }">
    <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">

      <!-- MAIN DETAIL COLUMN (2/3) -->
      <main class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm md:p-10 lg:col-span-2">

        <!-- Action Toolbar -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 pb-4">
          <div class="flex items-center gap-2">
            <button type="button" onclick="window.print()"
              class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-slate-50 px-3 py-1.5 text-xs font-semibold text-slate-700 transition-colors hover:bg-slate-100">
              <svg class="h-4 w-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
              </svg>
              Cetak Pengumuman
            </button>
          </div>

          <div class="flex items-center gap-2">
            <span class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Bagikan:</span>
            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?text={{ urlencode($pengumuman->judul . ' - ' . url()->current()) }}"
              target="_blank" rel="noopener noreferrer"
              class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500 text-white transition-opacity hover:opacity-90"
              title="Bagikan ke WhatsApp">
              <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                <path
                  d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99 0-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
              </svg>
            </a>
            <!-- Facebook -->
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
              rel="noopener noreferrer"
              class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-white transition-opacity hover:opacity-90"
              title="Bagikan ke Facebook">
              <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>
            <!-- Copy Link -->
            <button type="button"
              @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
              class="relative flex h-8 w-8 items-center justify-center rounded-full bg-slate-200 text-slate-700 transition-colors hover:bg-slate-300"
              title="Salin tautan">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              <span x-show="copied" x-cloak
                class="absolute -top-8 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-md bg-slate-800 px-2 py-1 text-[10px] font-semibold text-white shadow-md">
                Tersalin!
              </span>
            </button>
          </div>
        </div>

        <!-- Featured / Poster Image -->
        @if ($pengumuman->gambar)
          <div class="shadow-xs mb-8 overflow-hidden rounded-2xl border border-slate-100 bg-slate-50 p-2">
            <div class="relative cursor-pointer overflow-hidden rounded-xl" @click="imageModal = true">
              <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}"
                class="max-h-150 w-full rounded-xl object-contain shadow-sm transition-transform duration-300 hover:scale-[1.01]" />
              <div
                class="backdrop-blur-xs absolute bottom-3 right-3 flex items-center gap-1.5 rounded-lg bg-slate-900/75 px-3 py-1.5 text-xs font-semibold text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7" />
                </svg>
                Klik untuk memperbesar
              </div>
            </div>
          </div>

          <!-- Image Lightbox Modal -->
          <div x-show="imageModal" x-cloak x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="z-1000 fixed inset-0 flex items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm"
            @click.self="imageModal = false" @keydown.escape.window="imageModal = false">
            <div class="relative max-h-[90vh] max-w-5xl">
              <button @click="imageModal = false"
                class="absolute -top-10 right-0 flex items-center gap-1 text-sm font-semibold text-white hover:text-red-300">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Tutup
              </button>
              <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}"
                class="max-h-[85vh] w-auto rounded-xl object-contain shadow-2xl" />
            </div>
          </div>
        @endif

        <!-- Announcement Content Body -->
        <article
          class="prose prose-slate prose-headings:font-bold prose-headings:text-slate-800 prose-p:text-slate-700 prose-p:leading-relaxed prose-a:text-utama hover:prose-a:underline prose-li:text-slate-700 max-w-none text-justify text-base">
          {!! $pengumuman->konten !!}
        </article>

        <!-- Official Seal / Verification Note -->
        <div class="mt-12 rounded-xl border border-blue-100 bg-blue-50/50 p-5 text-xs text-slate-600">
          <div class="flex items-start gap-3">
            <div class="text-utama rounded-full bg-blue-100 p-2">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <div>
              <h4 class="font-bold text-slate-800">Diterbitkan Resmi</h4>
              <p class="mt-0.5 leading-relaxed text-slate-600">
                Pengumuman ini diterbitkan secara resmi oleh Dinas Komunikasi, Informatika dan Statistik Pemerintah
                Kabupaten Bangka.
                Untuk verifikasi dan pertanyaan lebih lanjut, silakan hubungi saluran informasi resmi kami.
              </p>
            </div>
          </div>
        </div>
      </main>
      <!-- MAIN DETAIL END -->

      <!-- SIDEBAR (1/3) -->
      <aside class="flex flex-col gap-6 lg:col-span-1">
        <!-- Back to list -->
        <a href="{{ route('pengumuman.index') }}"
          class="shadow-xs hover:text-utama flex items-center justify-between rounded-2xl border border-slate-200/80 bg-white p-4 text-sm font-bold text-slate-700 transition-all hover:border-blue-300">
          <span class="flex items-center gap-2">
            <svg class="text-utama h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Semua Pengumuman
          </span>
          <span class="text-xs text-slate-400">&rarr;</span>
        </a>

        <!-- Search Widget -->
        <div class="rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm">
          <h3 class="mb-3 text-sm font-bold text-slate-800">Cari Pengumuman</h3>
          <form action="{{ route('pengumuman.index') }}" method="GET" class="relative">
            <input type="text" name="search" placeholder="Kata kunci..."
              class="focus:border-utama focus:ring-utama w-full rounded-xl border border-slate-200 bg-slate-50 py-2 pl-9 pr-4 text-xs text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1" />
            <svg class="absolute left-3 top-1/2 h-3.5 w-3.5 -translate-y-1/2 text-slate-400" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </form>
        </div>

        <!-- Recent Announcements -->
        @if (isset($recentPengumumans) && $recentPengumumans->count())
          <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
            <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-sm font-bold text-slate-800">
              <svg class="text-utama h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
              </svg>
              Pengumuman Terbaru
            </h3>
            <div class="flex flex-col divide-y divide-slate-100">
              @foreach ($recentPengumumans as $recent)
                <article class="group py-3 first:pt-0 last:pb-0">
                  <div class="mb-1 text-[10px] font-medium text-slate-400">
                    {{ $recent->published_at?->translatedFormat('d M Y') ?? $recent->created_at->translatedFormat('d M Y') }}
                  </div>
                  <h4
                    class="group-hover:text-utama line-clamp-2 text-xs font-semibold text-slate-700 transition-colors">
                    <a href="{{ route('pengumuman.show', $recent->slug) }}">
                      {{ $recent->judul }}
                    </a>
                  </h4>
                </article>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Helpdesk Contact Card -->
        <div class="bg-linear-to-br rounded-2xl border border-slate-200/80 from-blue-50/50 to-white p-6 shadow-sm">
          <div class="bg-utama mb-3 flex h-10 w-10 items-center justify-center rounded-xl text-white shadow-sm">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h4 class="text-sm font-bold text-slate-800">Layanan Informasi</h4>
          <p class="mt-1 text-xs text-slate-500">
            Butuh informasi lebih lanjut mengenai pengumuman Pemerintah Kabupaten Bangka?
          </p>
          <a href="{{ url('/page/kontak-kami') }}"
            class="text-utama mt-3 inline-flex items-center gap-1 text-xs font-bold hover:underline">
            Hubungi Kami &rarr;
          </a>
        </div>
      </aside>
      <!-- SIDEBAR END -->

    </div>
  </section>
  <!-- CONTENT SECTION END -->
</x-app-layout>
