<x-app-layout>
  <!-- JUMBOTRON START -->
  <section x-data="{ current: 0, total: 5 }" x-init="setInterval(() => { current = (current + 1) % total }, 4000)">
    <div class="relative mt-16 h-72 overflow-hidden md:h-screen lg:mt-0">
      <div x-show="current === 0" x-transition:enter="transition ease-in-out duration-1000"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/view-1.jfif') }}')"></div>
      <div x-show="current === 1" x-transition:enter="transition ease-in-out duration-1000"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/view-2.jfif') }}'); display: none;"></div>
      <div x-show="current === 2" x-transition:enter="transition ease-in-out duration-1000"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/view-3.jfif') }}'); display: none;"></div>
      <div x-show="current === 3" x-transition:enter="transition ease-in-out duration-1000"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/view-4.jfif') }}'); display: none;"></div>
      <div x-show="current === 4" x-transition:enter="transition ease-in-out duration-1000"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('img/view-5.jfif') }}'); display: none;"></div>
      <div id="home"
        class="relative z-10 flex h-full w-full flex-col items-center justify-center gap-4 bg-black/60 text-white lg:gap-12">
        <h1 class="text-center text-base font-bold leading-relaxed lg:text-4xl">
          MENJAWAB KEBUTUHAN INFORMASI <br />
          PUBLIK WARGA BANGKA
        </h1>
        <div class="flex w-full max-w-sm flex-col items-center justify-center gap-4 lg:max-w-2xl lg:gap-7">
          <p class="w-full text-center text-sm font-medium text-white lg:text-base">
            Temukan informasi publik terkini dari Pemerintah Kabupaten Bangka
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- JUMBOTRON END -->

  <!-- BERITA & INFORMASI START -->
  <section class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 items-stretch gap-8 lg:grid-cols-3">

      <!-- MAIN NEWS / HEADLINE & CATEGORIES (COL SPAN 2) -->
      <div class="flex h-full flex-col gap-6 lg:col-span-2">
        <!-- HEADLINE NEWS START -->
        @if ($headline)
          <div class="h-95 md:h-105 group relative overflow-hidden rounded-2xl shadow-lg">
            <img class="h-full w-full object-contain transition-transform duration-500 group-hover:scale-105"
              src="{{ asset('storage/' . $headline->thumbnail) }}" alt="{{ $headline->judul }}" />
            <div class="bg-linear-to-t absolute inset-0 from-slate-950/90 via-slate-900/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 text-white md:p-8">
              <div class="mb-3 flex items-center gap-2">
                <span
                  class="rounded-full bg-red-600 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-white">Headline</span>
                <span class="text-xs text-slate-300">{{ $headline->kategori?->nama ?? '' }} &bull;
                  {{ $headline->published_at?->diffForHumans() ?? '' }}</span>
              </div>
              <h2
                class="mb-3 text-base font-bold leading-snug transition-colors hover:text-blue-300 md:text-2xl lg:text-3xl">
                <a href="{{ route('home') }}">{{ $headline->judul }}</a>
              </h2>
              <p class="mb-4 line-clamp-2 hidden text-sm text-slate-300 md:block">
                {!! Str::limit(strip_tags($headline->konten), 200) !!}
              </p>
              <a href="{{ route('home') }}"
                class="bg-utama inline-flex items-center gap-2 rounded-lg px-5 py-2.5 text-xs font-semibold text-white shadow transition-all hover:bg-blue-900 md:text-sm">
                Baca Selengkapnya
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>
        @else
          <div
            class="h-95 md:h-105 bg-linear-to-br flex flex-col items-center justify-center rounded-2xl border border-slate-200 from-slate-800 to-slate-900 p-8 text-center text-white shadow-lg">
            <div class="mb-4 rounded-full bg-white/10 p-4">
              <svg class="h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </div>
            <h2 class="mb-2 text-xl font-bold md:text-2xl">Headline Belum Tersedia</h2>
            <p class="max-w-md text-sm text-slate-400">Belum ada berita atau artikel utama yang dipublikasikan saat ini.
              Silakan kembali lagi nanti.</p>
          </div>
        @endif
        <!-- HEADLINE NEWS END -->

        <!-- BERITA & ARTIKEL CATEGORY TABS START -->
        <div class="flex flex-1 flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm"
          x-data="{ activeTab: 'berita' }">
          <div>
            <ul class="flex border-b border-slate-200 text-center text-sm font-bold">
              <li class="w-1/2">
                <button @click="activeTab = 'berita'"
                  :class="activeTab === 'berita' ? 'bg-utama text-white' : 'bg-slate-50 text-utama hover:bg-slate-100'"
                  class="flex w-full items-center justify-center gap-2 px-4 py-3.5 text-sm uppercase tracking-wider transition-colors duration-200 md:text-base">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                  </svg>
                  BERITA TERKINI
                </button>
              </li>
              <li class="w-1/2">
                <button @click="activeTab = 'artikel'"
                  :class="activeTab === 'artikel' ? 'bg-utama text-white' : 'bg-slate-50 text-utama hover:bg-slate-100'"
                  class="flex w-full items-center justify-center gap-2 px-4 py-3.5 text-sm uppercase tracking-wider transition-colors duration-200 md:text-base">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                  ARTIKEL
                </button>
              </li>
            </ul>
          </div>

          <div class="flex flex-1 flex-col p-4 sm:p-5">
            <!-- LIST BERITA -->
            <div x-show="activeTab === 'berita'" x-cloak class="flex flex-1 flex-col space-y-2">
              @forelse($beritas as $berita)
                <div
                  class="flex flex-1 flex-col gap-3 rounded-xl border border-transparent p-3 transition-colors hover:border-slate-100 hover:bg-slate-50 sm:flex-row">
                  <img class="h-24 w-full shrink-0 rounded-lg object-contain sm:w-36"
                    src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->judul }}" />
                  <div class="flex flex-1 flex-col justify-between py-0.5">
                    <div>
                      <span
                        class="mb-1 inline-block rounded bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600">{{ $berita->kategori?->nama ?? '' }}</span>
                      <h3 class="hover:text-utama line-clamp-2 text-sm font-bold text-slate-800 transition-colors">
                        <a href="{{ route('home') }}">{{ $berita->judul }}</a>
                      </h3>
                    </div>
                    <p class="mt-1 text-[11px] text-slate-400">{{ $berita->published_at?->diffForHumans() ?? '' }}</p>
                  </div>
                </div>
              @empty
                <p class="py-4 text-center text-sm text-slate-400">Belum ada berita terkini.</p>
              @endforelse

              <div class="mt-auto border-t border-slate-100 pt-3 text-center">
                <a href="{{ route('home') }}"
                  class="text-utama inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-5 py-2 text-xs font-semibold transition-all hover:bg-slate-100 hover:text-blue-900">
                  Lihat Selengkapnya Berita
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- LIST ARTIKEL -->
            <div x-show="activeTab === 'artikel'" x-cloak class="flex flex-1 flex-col space-y-2">
              @forelse($artikels as $artikel)
                <div
                  class="flex flex-1 flex-col gap-3 rounded-xl border border-transparent p-3 transition-colors hover:border-slate-100 hover:bg-slate-50 sm:flex-row">
                  <img class="h-24 w-full shrink-0 rounded-lg object-contain sm:w-36"
                    src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->judul }}" />
                  <div class="flex flex-1 flex-col justify-between py-0.5">
                    <div>
                      <span
                        class="mb-1 inline-block rounded bg-purple-50 px-2 py-0.5 text-[10px] font-semibold text-purple-600">{{ $artikel->kategori?->nama ?? '' }}</span>
                      <h3 class="hover:text-utama line-clamp-2 text-sm font-bold text-slate-800 transition-colors">
                        <a href="{{ route('home') }}">{{ $artikel->judul }}</a>
                      </h3>
                    </div>
                    <p class="mt-1 text-[11px] text-slate-400">{{ $artikel->published_at?->diffForHumans() ?? '' }}
                    </p>
                  </div>
                </div>
              @empty
                <p class="py-4 text-center text-sm text-slate-400">Belum ada artikel.</p>
              @endforelse

              <div class="mt-auto border-t border-slate-100 pt-3 text-center">
                <a href="{{ route('home') }}"
                  class="text-utama inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-5 py-2 text-xs font-semibold transition-all hover:bg-slate-100 hover:text-blue-900">
                  Lihat Selengkapnya Artikel
                  <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- BERITA & ARTIKEL CATEGORY TABS END -->
      </div>

      <!-- SIDEBAR: BERITA CAMPURAN (TERBARU & TERPOPULER) & BANK DATA START -->
      <div class="flex h-full flex-col gap-6 lg:col-span-1">
        <div class="flex flex-1 flex-col rounded-2xl border border-slate-100 bg-white p-6 shadow-sm"
          x-data="{ tab: 'terbaru' }">
          <div class="mb-5 flex items-center justify-between border-b border-slate-100 pb-4">
            <h3 class="text-base font-bold text-slate-800 md:text-lg">Informasi Bangka</h3>
            <div class="flex rounded-xl bg-slate-100 p-1">
              <button @click="tab = 'terbaru'"
                :class="tab === 'terbaru' ? 'bg-white text-utama shadow-sm font-bold' :
                    'text-slate-500 hover:text-slate-800 font-medium'"
                class="rounded-lg px-3 py-1.5 text-xs transition-all">
                Terbaru
              </button>
              <button @click="tab = 'terpopuler'"
                :class="tab === 'terpopuler' ? 'bg-white text-utama shadow-sm font-bold' :
                    'text-slate-500 hover:text-slate-800 font-medium'"
                class="rounded-lg px-3 py-1.5 text-xs transition-all">
                Terpopuler
              </button>
            </div>
          </div>

          <!-- TAB CONTENT: TERBARU -->
          <div x-show="tab === 'terbaru'" x-cloak class="space-y-4">
            @forelse($terbaru as $item)
              <a href="{{ route('home') }}"
                class="group flex items-start gap-3 border-b border-slate-100 pb-3 last:border-0 last:pb-0">
                <img class="h-16 w-20 shrink-0 rounded-lg object-contain"
                  src="{{ asset('storage/' . $item->thumbnail) }}" alt="" />
                <div class="flex flex-col">
                  <div class="mb-1 flex items-center gap-1.5">
                    <span
                      class="{{ $item->tipe === 'berita' ? 'text-blue-600 bg-blue-50' : 'text-purple-600 bg-purple-50' }} rounded px-1.5 py-0.5 text-[10px] font-semibold">{{ ucfirst($item->tipe) }}</span>
                    <span class="text-[10px] text-slate-400">{{ $item->published_at?->diffForHumans() ?? '' }}</span>
                  </div>
                  <h4
                    class="group-hover:text-utama line-clamp-2 text-xs font-semibold text-slate-800 transition-colors sm:text-sm">
                    {{ $item->judul }}
                  </h4>
                </div>
              </a>
            @empty
              <p class="py-4 text-center text-xs text-slate-400">Belum ada informasi.</p>
            @endforelse
          </div>

          <!-- TAB CONTENT: TERPOPULER -->
          <div x-show="tab === 'terpopuler'" x-cloak class="space-y-4">
            @forelse($terpopuler as $item)
              <a href="{{ route('home') }}"
                class="group flex items-start gap-3 border-b border-slate-100 pb-3 last:border-0 last:pb-0">
                <img class="h-16 w-20 shrink-0 rounded-lg object-contain"
                  src="{{ asset('storage/' . $item->thumbnail) }}" alt="" />
                <div class="flex flex-col">
                  <div class="mb-1 flex items-center gap-1.5">
                    <span
                      class="{{ $item->tipe === 'berita' ? 'text-blue-600 bg-blue-50' : 'text-purple-600 bg-purple-50' }} rounded px-1.5 py-0.5 text-[10px] font-semibold">{{ ucfirst($item->tipe) }}</span>
                    <span class="text-[10px] text-slate-400">{{ number_format($item->views) }} views</span>
                  </div>
                  <h4
                    class="group-hover:text-utama line-clamp-2 text-xs font-semibold text-slate-800 transition-colors sm:text-sm">
                    {{ $item->judul }}
                  </h4>
                </div>
              </a>
            @empty
              <p class="py-4 text-center text-xs text-slate-400">Belum ada informasi populer.</p>
            @endforelse
          </div>
        </div>

        <!-- BANK DATA SECTION START -->
        <div class="flex-1 rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
          <div class="mb-4 flex items-center justify-between border-b border-slate-100 pb-4">
            <div class="flex items-center gap-2">
              <div class="text-utama flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-slate-800">Bank Data & Publikasi</h3>
            </div>
          </div>

          <p class="mb-4 text-xs text-slate-500">Daftar dokumen resmi dan publikasi data Kabupaten Bangka.</p>

          <div class="space-y-4">
            <!-- Item 1 -->
            <div
              class="rounded-xl border border-slate-200/80 bg-slate-50 p-3.5 transition-all hover:border-blue-200 hover:bg-blue-50/30">
              <a href="#"
                class="hover:text-utama mb-2 line-clamp-2 block text-xs font-bold text-slate-800 transition-colors sm:text-sm">
                Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP) Tahun 2023
              </a>
              <div class="flex items-center justify-between border-t border-slate-200/60 pt-2 text-[11px]">
                <span class="flex items-center gap-1 text-slate-500">
                  <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  1 Lampiran (PDF)
                </span>
                <a href="#" class="text-utama flex items-center gap-1 font-semibold hover:underline">
                  Unduh
                  <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Item 2 -->
            <div
              class="rounded-xl border border-slate-200/80 bg-slate-50 p-3.5 transition-all hover:border-blue-200 hover:bg-blue-50/30">
              <a href="#"
                class="hover:text-utama mb-2 line-clamp-2 block text-xs font-bold text-slate-800 transition-colors sm:text-sm">
                Bangka Dalam Angka & Buku Data Statistik Sektoral Kominfo 2024
              </a>
              <div class="flex items-center justify-between border-t border-slate-200/60 pt-2 text-[11px]">
                <span class="flex items-center gap-1 text-slate-500">
                  <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  2 Lampiran (PDF, XLSX)
                </span>
                <a href="#" class="text-utama flex items-center gap-1 font-semibold hover:underline">
                  Unduh
                  <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </a>
              </div>
            </div>

            <!-- Item 3 -->
            <div
              class="rounded-xl border border-slate-200/80 bg-slate-50 p-3.5 transition-all hover:border-blue-200 hover:bg-blue-50/30">
              <a href="#"
                class="hover:text-utama mb-2 line-clamp-2 block text-xs font-bold text-slate-800 transition-colors sm:text-sm">
                Dokumen Rencana Strategis (Renstra) Dinkominfotik 2021-2026
              </a>
              <div class="flex items-center justify-between border-t border-slate-200/60 pt-2 text-[11px]">
                <span class="flex items-center gap-1 text-slate-500">
                  <svg class="h-3.5 w-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  1 Lampiran (PDF)
                </span>
                <a href="#" class="text-utama flex items-center gap-1 font-semibold hover:underline">
                  Unduh
                  <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                </a>
              </div>
            </div>
          </div>

          <a href="#" class="text-utama mt-5 block text-center text-xs font-bold hover:underline">
            Lihat Semua Bank Data &rarr;
          </a>
        </div>
        <!-- BANK DATA SECTION END -->
      </div>
      <!-- SIDEBAR END -->

    </div>
  </section>
  <!-- BERITA & INFORMASI END -->

  <!-- CAROUSEL START -->
  <div class="relative w-full p-6" x-data="{ current: 0, total: 3 }" x-init="setInterval(() => { current = (current + 1) % total }, 5000)">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <template
        x-for="(img, index) in [
          '{{ asset('img/banner-1.jpg') }}',
          '{{ asset('img/banner-2.jpg') }}',
          '{{ asset('img/banner-3.jpg') }}'
        ]"
        :key="index">
        <div x-show="current === index" x-transition:enter="transition ease-in-out duration-700"
          x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-700" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0" class="absolute inset-0">
          <img :src="img" class="block h-full w-full object-cover" :alt="'Banner ' + (index + 1)" />
        </div>
      </template>
    </div>

    <!-- Slider indicators -->
    <div class="absolute bottom-10 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
      <template x-for="i in total" :key="i">
        <button type="button" @click="current = i - 1" :class="current === i - 1 ? 'bg-white' : 'bg-white/50'"
          class="h-3 w-3 rounded-full" :aria-label="'Slide ' + i"></button>
      </template>
    </div>

    <!-- Slider controls -->
    <button type="button"
      class="inset-s-6 group absolute top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
      @click="current = (current - 1 + total) % total">
      <span
        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 focus:ring-4 focus:ring-white group-hover:bg-white/50">
        <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 1 1 5l4 4" />
        </svg>
        <span class="sr-only">Previous</span>
      </span>
    </button>
    <button type="button"
      class="inset-e-6 group absolute top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
      @click="current = (current + 1) % total">
      <span
        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 focus:ring-4 focus:ring-white group-hover:bg-white/50">
        <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 9 4-4-4-4" />
        </svg>
        <span class="sr-only">Next</span>
      </span>
    </button>
  </div>
  <!-- CAROUSEL END -->

  <!-- FOTO KEGIATAN START -->
  <section class="container mx-auto px-4 py-8">
    <div class="mb-8 flex flex-col items-center gap-4 md:flex-row md:justify-between">
      <div class="flex flex-col items-center gap-1 md:items-start">
        <span class="text-utama rounded-full bg-blue-50 px-3 py-1 text-xs font-bold uppercase tracking-wider">Galeri
          Dokumentasi</span>
        <h2 class="mt-2 text-2xl font-bold text-slate-900 md:text-3xl">Foto-Foto Kegiatan</h2>
      </div>
      <a href="#"
        class="text-utama hidden w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow md:inline-flex">
        Lihat Semua Foto
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
      <!-- Foto 1 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden">
          <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg"
            alt="Foto Kegiatan" />
          <div
            class="absolute right-3 top-3 rounded-md bg-slate-900/60 px-2.5 py-1 text-xs text-white backdrop-blur-md">
            18 Okt 2024
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Peninjauan Langsung Penanganan Stunting oleh Pj Bupati Bangka di Desa Gunung Muda</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Kegiatan kunjungan kerja dan penyerahan bantuan secara langsung kepada keluarga penerima manfaat.
          </p>
        </div>
      </div>

      <!-- Foto 2 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden">
          <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg"
            alt="Foto Kegiatan" />
          <div
            class="absolute right-3 top-3 rounded-md bg-slate-900/60 px-2.5 py-1 text-xs text-white backdrop-blur-md">
            15 Okt 2024
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Rapat Koordinasi Penguatan Netralitas ASN Pemkab Bangka</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Sosialisasi edaran netralitas ASN dan pembekalan pengawasan internal di lingkungan Pemkab Bangka.
          </p>
        </div>
      </div>

      <!-- Foto 3 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden">
          <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg"
            alt="Foto Kegiatan" />
          <div
            class="absolute right-3 top-3 rounded-md bg-slate-900/60 px-2.5 py-1 text-xs text-white backdrop-blur-md">
            12 Okt 2024
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Audensi Bersama Tokoh Masyarakat Mengenai Kebijakan Daerah</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Diskusi terbuka dalam rangka penyampaian aspirasi masyarakat terkait program pembangunan daerah.
          </p>
        </div>
      </div>
    </div>
    <div class="mt-8 flex justify-center md:hidden">
      <a href="#"
        class="text-utama inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow">
        Lihat Semua Foto
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>
  </section>
  <!-- FOTO KEGIATAN END -->

  <!-- VIDEO PUBLIKASI START -->
  <section class="container mx-auto px-4 py-8">
    <div class="mb-8 flex flex-col items-center gap-4 md:flex-row md:justify-between">
      <div class="flex flex-col items-center gap-1 md:items-start">
        <span class="text-utama rounded-full bg-blue-50 px-3 py-1 text-xs font-bold uppercase tracking-wider">Media
          Multimedia</span>
        <h2 class="mt-2 text-2xl font-bold text-slate-900 md:text-3xl">Video Publikasi</h2>
      </div>
      <a href="#"
        class="text-utama hidden w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow md:inline-flex">
        Lihat Semua Video
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
      <!-- Video 1 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden bg-slate-900">
          <img class="h-full w-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg"
            alt="Video Thumbnail" />
          <div class="absolute inset-0 flex items-center justify-center">
            <div
              class="bg-utama/90 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg transition-transform group-hover:scale-110">
              <svg class="ml-0.5 h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" />
              </svg>
            </div>
          </div>
          <div
            class="absolute bottom-3 right-3 rounded bg-slate-950/80 px-2 py-0.5 text-[10px] font-medium text-white">
            03:45
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Profil Pelayanan Informasi Publik Dinkominfotik Bangka 2024</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Video singkat komitmen dan berbagai inovasi layanan informasi publik di Kabupaten Bangka.
          </p>
        </div>
      </div>

      <!-- Video 2 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden bg-slate-900">
          <img class="h-full w-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg"
            alt="Video Thumbnail" />
          <div class="absolute inset-0 flex items-center justify-center">
            <div
              class="bg-utama/90 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg transition-transform group-hover:scale-110">
              <svg class="ml-0.5 h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" />
              </svg>
            </div>
          </div>
          <div
            class="absolute bottom-3 right-3 rounded bg-slate-950/80 px-2 py-0.5 text-[10px] font-medium text-white">
            05:20
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Dokumentasi Program Penurunan Stunting Terpadu Kabupaten Bangka</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Liputan khusus aksi konvergensi pencegahan stunting oleh tim gabungan Pemkab Bangka.
          </p>
        </div>
      </div>

      <!-- Video 3 -->
      <div
        class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
        <div class="relative h-52 overflow-hidden bg-slate-900">
          <img class="h-full w-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-105"
            src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg"
            alt="Video Thumbnail" />
          <div class="absolute inset-0 flex items-center justify-center">
            <div
              class="bg-utama/90 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg transition-transform group-hover:scale-110">
              <svg class="ml-0.5 h-6 w-6 fill-current" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" />
              </svg>
            </div>
          </div>
          <div
            class="absolute bottom-3 right-3 rounded bg-slate-950/80 px-2 py-0.5 text-[10px] font-medium text-white">
            02:15
          </div>
        </div>
        <div class="p-5">
          <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
            <a href="#">Tutorial Penggunaan Layanan Dulang Emas Dinkominfotik</a>
          </h3>
          <p class="line-clamp-2 text-xs text-slate-500">
            Panduan penggunaan portal Dulang Emas untuk masyarakat Kabupaten Bangka.
          </p>
        </div>
      </div>
    </div>
    <div class="mt-8 flex justify-center md:hidden">
      <a href="#"
        class="text-utama inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow">
        Lihat Semua Video
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>
  </section>
  <!-- VIDEO PUBLIKASI END -->

  <!-- PENGUMUMAN DAN LINK TERKAIT START -->
  <div class="container mx-auto flex flex-col gap-5 p-5 md:flex-row">
    <div class="flex-1 rounded-lg bg-white p-6 shadow-md">
      <h2 class="mb-5 border-b-2 border-blue-500 pb-3 text-xl font-bold uppercase tracking-wide text-gray-800">
        Pengumuman
      </h2>
      <div class="announcement mb-5">
        <img class="mb-3 w-full rounded-lg object-cover shadow-md" src="{{ asset('img/banner-1.jpg') }}"
          alt="Gambar Pengumuman" />
        <h3 class="mb-3 text-2xl font-bold text-blue-500">
          Sosialisasi Program Perlindungan Jaminan Sosial
        </h3>
        <p class="mb-2 text-sm text-gray-500">18/10/2024 | Dinkominfotik</p>
        <p class="text-base text-gray-700">
          Sosialisasi ini bertujuan untuk memberikan pemahaman mengenai pentingnya perlindungan jaminan sosial bagi
          masyarakat. Acara ini dihadiri oleh berbagai lapisan masyarakat dan narasumber dari lembaga terkait.
        </p>
      </div>
    </div>

    <div class="rounded-lg bg-white p-6 shadow-md md:w-1/3">
      <h2 class="mb-5 border-b-2 border-blue-500 pb-3 text-xl font-bold uppercase tracking-wide text-gray-800">
        Link Terkait
      </h2>
      <div class="flex flex-col gap-4">
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="http://sidikjari.bangka.go.id">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xfinger_0.png.pagespeed.ic.0yU9yIn3fa.webp"
              alt="Sidik Jari" />
          </a>
        </div>
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="http://bangka.go.id">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xWEB,P20BANGKA.png.pagespeed.ic.k8iB-kBOsS.webp"
              alt="Bangka" />
          </a>
        </div>
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="https://satudata.bangka.go.id">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xSATU,P20DATA_0.png.pagespeed.ic.skSGNnc9YX.webp"
              alt="Satu Data" />
          </a>
        </div>
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="https://www.lapor.go.id/">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xLAPOR.png.pagespeed.ic.kNG7j29pcW.webp"
              alt="Lapor" />
          </a>
        </div>
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="https://lpse.bangka.go.id/eproc4">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xLPSE1.png.pagespeed.ic.TfyZEWL04s.webp"
              alt="LPSE" />
          </a>
        </div>
        <div
          class="transform rounded-lg border border-gray-300 bg-white p-4 shadow-sm transition-transform hover:-translate-y-1 hover:shadow-lg">
          <a href="https://pesonadukcapil.bangka.go.id/">
            <img class="w-full rounded-lg"
              src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xPESONA,P20DUKCPIL..jpg.pagespeed.ic.0EPVyK3fnf.webp"
              alt="Pesona Dukcapil" />
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- PENGUMUMAN DAN LINK TERKAIT END -->

  <!-- LINK PEMDA START -->
  <div class="container mx-auto mt-7 px-4">
    <div class="bg-utama rounded-t-lg p-4 px-8">
      <h1 class="text-xl font-bold text-white">Link Pemda Lainnya</h1>
    </div>
    <div
      class="flex flex-col items-center justify-center gap-5 rounded-b-lg bg-white py-5 md:flex-row md:gap-5 md:px-8">
      <div class="flex w-full items-center justify-evenly md:w-auto md:justify-center md:gap-5">
        <a href="https://babelprov.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/prov_babel.png') }}" alt="Provinsi Kepulauan Bangka Belitung" width="120" />
          <p class="text-center text-xs font-semibold">Provinsi Kepulauan<br />Bangka Belitung</p>
        </a>
        <a href="https://pangkalpinangkota.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kota_pangkalpinang.png') }}" alt="Kota Pangkalpinang" width="120" />
          <p class="text-center text-xs font-semibold">Kota<br />Pangkalpinang</p>
        </a>
      </div>
      <div class="flex w-full items-center justify-evenly md:w-auto md:justify-center md:gap-5">
        <a href="https://belitung.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kab_belitung.png') }}" alt="Kabupaten Belitung" width="120" />
          <p class="text-center text-xs font-semibold">Kabupaten<br />Belitung</p>
        </a>
        <a href="https://bangkabaratkab.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kab_bangkabarat.png') }}" alt="Kabupaten Bangka Barat" width="120" />
          <p class="text-center text-xs font-semibold">Kabupaten<br />Bangka Barat</p>
        </a>
      </div>
      <div class="flex w-full items-center justify-evenly md:w-auto md:justify-center md:gap-5">
        <a href="https://bangkatengahkab.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kab_bangkatengah.png') }}" alt="Kabupaten Bangka Tengah" width="120" />
          <p class="text-center text-xs font-semibold">Kabupaten<br />Bangka Tengah</p>
        </a>
        <a href="https://bangkaselatankab.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kab_bangkaselatan.png') }}" alt="Kabupaten Bangka Selatan" width="120" />
          <p class="text-center text-xs font-semibold">Kabupaten<br />Bangka Selatan</p>
        </a>
      </div>
      <div class="flex w-full items-center justify-evenly md:w-auto md:justify-center">
        <a href="https://portal.beltim.go.id/"
          class="flex flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
          <img src="{{ asset('img/kab_belitungtimur.png') }}" alt="Kabupaten Belitung Timur" width="120" />
          <p class="text-center text-xs font-semibold">Kabupaten<br />Belitung Timur</p>
        </a>
      </div>
    </div>
  </div>
  <!-- LINK PEMDA END -->
</x-app-layout>
