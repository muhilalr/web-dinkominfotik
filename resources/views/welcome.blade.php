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
                <a
                  href="{{ route('posts.show', ['tipe' => $headline->tipe, 'slug' => $headline->slug]) }}">{{ $headline->judul }}</a>
              </h2>
              <p class="mb-4 line-clamp-2 hidden text-sm text-slate-300 md:block">
                {!! Str::limit(strip_tags($headline->konten), 200) !!}
              </p>
              <a href="{{ route('posts.show', ['tipe' => $headline->tipe, 'slug' => $headline->slug]) }}"
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
                        <a
                          href="{{ route('posts.show', ['tipe' => $berita->tipe, 'slug' => $berita->slug]) }}">{{ $berita->judul }}</a>
                      </h3>
                    </div>
                    <p class="mt-1 text-[11px] text-slate-400">{{ $berita->published_at?->diffForHumans() ?? '' }}</p>
                  </div>
                </div>
                <div class="mt-auto border-t border-slate-100 pt-3 text-center">
                  <a href="{{ route('posts.berita') }}"
                    class="text-utama inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-5 py-2 text-xs font-semibold transition-all hover:bg-slate-100 hover:text-blue-900">
                    Lihat Selengkapnya Berita
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                  </a>
                </div>
              @empty
                <div class="flex min-h-32 flex-1 items-center justify-center text-center">
                  <p class="text-sm text-slate-400">Belum ada berita terkini.</p>
                </div>
              @endforelse
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
                        <a
                          href="{{ route('posts.show', ['tipe' => $artikel->tipe, 'slug' => $artikel->slug]) }}">{{ $artikel->judul }}</a>
                      </h3>
                    </div>
                    <p class="mt-1 text-[11px] text-slate-400">{{ $artikel->published_at?->diffForHumans() ?? '' }}
                    </p>
                  </div>
                </div>
                <div class="mt-auto border-t border-slate-100 pt-3 text-center">
                  <a href="{{ route('posts.artikel') }}"
                    class="text-utama inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-5 py-2 text-xs font-semibold transition-all hover:bg-slate-100 hover:text-blue-900">
                    Lihat Selengkapnya Artikel
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                  </a>
                </div>
              @empty
                <div class="flex min-h-32 flex-1 items-center justify-center text-center">
                  <p class="text-sm text-slate-400">Belum ada artikel.</p>
                </div>
              @endforelse

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
          <div x-show="tab === 'terbaru'" x-cloak class="flex flex-1 flex-col space-y-4">
            @forelse($terbaru as $item)
              <a href="{{ route('posts.show', ['tipe' => $item->tipe, 'slug' => $item->slug]) }}"
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
              <div class="flex flex-1 items-center justify-center text-center">
                <p class="text-xs text-slate-400">Belum ada informasi.</p>
              </div>
            @endforelse
          </div>

          <!-- TAB CONTENT: TERPOPULER -->
          <div x-show="tab === 'terpopuler'" x-cloak class="flex flex-1 flex-col space-y-4">
            @forelse($terpopuler as $item)
              <a href="{{ route('posts.show', ['tipe' => $item->tipe, 'slug' => $item->slug]) }}"
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
              <div class="flex flex-1 items-center justify-center text-center">
                <p class="text-xs text-slate-400">Belum ada informasi populer.</p>
              </div>
            @endforelse
          </div>
        </div>

        <!-- BANK DATA SECTION START -->
        <div class="flex flex-1 flex-col rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
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

          <div class="flex flex-1 flex-col space-y-4">
            @forelse($bankDatas as $bankData)
              <div
                class="rounded-xl border border-slate-200/80 bg-slate-50 p-3.5 transition-all hover:border-blue-200 hover:bg-blue-50/30">
                @if ($bankData->tahun)
                  <span
                    class="mb-1 inline-block rounded bg-blue-50 px-1.5 py-0.5 text-[9px] font-semibold text-blue-600">Tahun
                    {{ $bankData->tahun }}</span>
                @endif
                <a href="#"
                  class="hover:text-utama mb-2 line-clamp-2 block text-xs font-bold text-slate-800 transition-colors sm:text-sm">
                  {{ $bankData->judul }}
                </a>
                @forelse($bankData->lampiranBankData as $lampiran)
                  <div
                    class="mt-2 flex items-center justify-between rounded-lg border border-slate-200/60 bg-white px-3 py-2">
                    <span class="flex items-center gap-1.5 text-[11px] text-slate-600">
                      <svg class="h-3.5 w-3.5 shrink-0 text-slate-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                      </svg>
                      <span class="line-clamp-1">{{ $lampiran->file_name }}</span>
                      <span
                        class="shrink-0 rounded bg-slate-100 px-1.5 py-0.5 text-[9px] font-semibold text-slate-500">
                        {{ strtoupper(pathinfo($lampiran->file_name, PATHINFO_EXTENSION)) }}
                      </span>
                    </span>
                    <a href="{{ route('bank-data.download', $lampiran) }}"
                      class="text-utama flex shrink-0 items-center gap-1 text-[11px] font-semibold hover:underline">
                      Unduh
                      <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                      </svg>
                    </a>
                  </div>
                @empty
                  <p class="mt-1 text-[11px] italic text-slate-400">Tidak ada lampiran</p>
                @endforelse
              </div>
            @empty
              <div class="flex flex-1 items-center justify-center text-center">
                <p class="text-xs text-slate-400">Belum ada bank data.</p>
              </div>
            @endforelse
          </div>

          @if ($bankDatas->isNotEmpty())
            <a href="{{ route('bank-data.index') }}"
              class="text-utama mt-5 block text-center text-xs font-bold hover:underline">
              Lihat Semua Bank Data &rarr;
            </a>
          @endif
        </div>
        <!-- BANK DATA SECTION END -->
      </div>
      <!-- SIDEBAR END -->

    </div>
  </section>
  <!-- BERITA & INFORMASI END -->

  <!-- CAROUSEL START -->
  <div class="relative w-full p-6">
    @if ($banners->isNotEmpty())
      <div class="relative h-56 overflow-hidden rounded-lg md:h-96" x-data="{ current: 0, total: {{ $banners->count() }} }" x-init="setInterval(() => { current = (current + 1) % total }, 5000)">
        @foreach ($banners as $banner)
          <div x-show="current === {{ $loop->index }}" x-transition:enter="transition ease-in-out duration-700"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-700" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0">
            @if ($banner->link_url)
              <a href="{{ $banner->link_url }}">
                <img src="{{ asset('storage/' . $banner->gambar) }}" class="block h-full w-full object-cover"
                  alt="Banner {{ $loop->iteration }}" />
              </a>
            @else
              <img src="{{ asset('storage/' . $banner->gambar) }}" class="block h-full w-full object-cover"
                alt="Banner {{ $loop->iteration }}" />
            @endif
          </div>
        @endforeach

        @if ($banners->count() > 1)
          <!-- Slider indicators -->
          <div class="absolute bottom-10 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
            @foreach ($banners as $banner)
              <button type="button" @click="current = {{ $loop->index }}"
                :class="current === {{ $loop->index }} ? 'bg-white' : 'bg-white/50'" class="h-3 w-3 rounded-full"
                aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
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
        @endif
      </div>
    @else
      <div class="relative flex h-56 items-center justify-center overflow-hidden rounded-lg bg-slate-100 md:h-96">
        <div class="text-center">
          <svg class="mx-auto mb-4 h-12 w-12 text-slate-300" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="text-sm font-medium text-slate-400">Banner belum tersedia</p>
          <p class="mt-1 text-xs text-slate-300">Upload banner melalui panel admin</p>
        </div>
      </div>
    @endif
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
      <a href="{{ route('galeri-foto.index') }}"
        class="text-utama hidden w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow md:inline-flex">
        Lihat Semua Foto
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
      @forelse($galeriFotos as $galeri)
        <div
          class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
          <div class="relative h-52 overflow-hidden">
            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
              src="{{ $galeri->foto->first() ? asset('storage/' . $galeri->foto->first()->gambar) : 'https://placehold.co/600x400?text=No+Image' }}"
              alt="{{ $galeri->judul }}" />
            <div
              class="absolute right-3 top-3 rounded-md bg-slate-900/60 px-2.5 py-1 text-xs text-white backdrop-blur-md">
              {{ $galeri->event_date?->format('d M Y') ?? '' }}
            </div>
            @if ($galeri->foto->count() > 1)
              <div
                class="absolute bottom-3 right-3 flex items-center gap-1 rounded-md bg-slate-900/60 px-2 py-1 text-[10px] text-white backdrop-blur-md">
                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $galeri->foto->count() }} foto
              </div>
            @endif
          </div>
          <div class="p-5">
            <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
              <a href="{{ route('galeri-foto.show', $galeri->slug) }}">{{ $galeri->judul }}</a>
            </h3>
          </div>
        </div>
      @empty
        <div class="col-span-full flex flex-col items-center justify-center py-16 text-center">
          <svg class="mb-4 h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <p class="text-sm font-medium text-slate-400">Belum ada galeri foto kegiatan.</p>
        </div>
      @endforelse
    </div>
    <div class="mt-8 flex justify-center md:hidden">
      <a href="{{ route('galeri-foto.index') }}"
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
      <a href="{{ route('video-kegiatan.index') }}"
        class="text-utama hidden w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold shadow-sm transition-all hover:text-blue-900 hover:shadow md:inline-flex">
        Lihat Semua Video
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
      </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
      @forelse($videoKegiatans as $video)
        <div
          class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all hover:shadow-md">
          <div class="relative h-52 overflow-hidden bg-slate-900">
            <img class="h-full w-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-105"
              src="{{ $video->youtube_thumbnail_url }}" alt="{{ $video->judul }}" />
            <a href="{{ route('video-kegiatan.show', $video->slug) }}"
              class="absolute inset-0 flex items-center justify-center">
              <div
                class="bg-utama/90 flex h-12 w-12 items-center justify-center rounded-full text-white shadow-lg transition-transform group-hover:scale-110">
                <svg class="ml-0.5 h-6 w-6 fill-current" viewBox="0 0 24 24">
                  <path d="M8 5v14l11-7z" />
                </svg>
              </div>
            </a>
            <div
              class="absolute bottom-3 right-3 rounded bg-slate-950/80 px-2 py-0.5 text-[10px] font-medium text-white">
              {{ $video->created_at->translatedFormat('d M Y') }}
            </div>
          </div>
          <div class="p-5">
            <h3 class="group-hover:text-utama mb-2 line-clamp-2 text-base font-bold text-slate-800 transition-colors">
              <a href="{{ route('video-kegiatan.show', $video->slug) }}">{{ $video->judul }}</a>
            </h3>
            @if ($video->deskripsi)
              <p class="line-clamp-2 text-xs text-slate-500">
                {{ $video->deskripsi }}
              </p>
            @endif
          </div>
        </div>
      @empty
        <div class="col-span-full flex flex-col items-center justify-center py-16 text-center">
          <svg class="mb-4 h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
          <p class="text-sm font-medium text-slate-400">Belum ada video kegiatan.</p>
        </div>
      @endforelse
    </div>
    <div class="mt-8 flex justify-center md:hidden">
      <a href="{{ route('video-kegiatan.index') }}"
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
  <div class="container mx-auto flex flex-col gap-5 p-5 md:flex-row" x-data="{ linkHeight: 'auto' }" x-init="$nextTick(() => { linkHeight = $refs.pengumumanSection.offsetHeight + 'px' })">
    <div class="flex-1 rounded-lg bg-white p-6 shadow-md" x-ref="pengumumanSection">
      <div class="mb-5 flex flex-col items-center justify-between gap-3 border-b-2 border-blue-500 pb-3 md:flex-row">
        <h2 class="text-xl font-bold uppercase tracking-wide text-gray-800">
          Pengumuman
        </h2>
        @if ($pengumuman)
          <a href="{{ route('pengumuman.index') }}"
            class="bg-utama inline-flex w-fit items-center rounded-lg px-4 py-2 text-xs font-bold text-white transition-colors hover:bg-blue-950 sm:px-5 sm:py-2.5">
            Lihat Semua Pengumuman &rarr;
          </a>
        @endif
      </div>
      <div class="announcement mb-2">
        @if ($pengumuman)
          <div>
            @if ($pengumuman->gambar)
              <img class="mb-3 h-80 w-full rounded-lg object-contain shadow-md"
                src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="{{ $pengumuman->judul }}" />
            @endif
            <h3 class="mb-3 text-lg font-bold text-blue-500">
              {{ $pengumuman->judul }}
            </h3>
            <p class="mb-2 text-sm text-gray-500">
              {{ $pengumuman->published_at?->format('d/m/Y') ?? '' }} | Dinkominfotik
            </p>
            <p class="text-sm text-gray-700">
              {!! Str::limit(strip_tags($pengumuman->konten), 200) !!}
            </p>
            <a href="{{ route('pengumuman.show', $pengumuman->slug) }}"
              class="text-utama mt-3 inline-block text-xs font-bold hover:underline">
              Lihat Selengkapnya &rarr;
            </a>
          </div>
        @else
          <div class="flex flex-col items-center justify-center py-8 text-center">
            <svg class="mb-3 h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
            </svg>
            <p class="text-sm text-slate-400">Belum ada pengumuman.</p>
          </div>
        @endif
      </div>
    </div>

    <div class="flex flex-col overflow-hidden rounded-lg bg-white p-6 shadow-md md:w-1/3"
      :style="'max-height:' + linkHeight">
      <h2 class="mb-5 border-b-2 border-blue-500 pb-3 text-xl font-bold uppercase tracking-wide text-gray-800">
        Link Terkait
      </h2>
      <div class="flex flex-1 flex-col gap-3 overflow-y-auto">
        @forelse($linkLayanan as $link)
          <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
            class="shadow-xs group flex items-center gap-3.5 rounded-xl border border-slate-200 bg-slate-50/50 p-3 transition-all duration-200 hover:-translate-y-0.5 hover:border-blue-300 hover:bg-blue-50/40 hover:shadow-md">
            @if ($link->gambar)
              <img class="h-12 w-12 shrink-0 rounded-lg border border-slate-100 bg-white object-contain p-1"
                src="{{ asset('storage/' . $link->gambar) }}" alt="{{ $link->judul }}" />
            @endif
            <span class="group-hover:text-utama text-xs font-semibold text-slate-800 transition-colors sm:text-sm">
              {{ $link->judul }}
            </span>
          </a>
        @empty
          <div class="flex flex-1 items-center justify-center py-4">
            <p class="text-xs text-slate-400">Belum ada link terkait.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>
  <!-- PENGUMUMAN DAN LINK TERKAIT END -->

  <!-- LINK PEMDA START -->
  <div class="container mx-auto mt-7 px-4">
    <div class="bg-utama rounded-t-lg p-4 px-8">
      <h1 class="text-xl font-bold text-white">Link Pemda Lainnya</h1>
    </div>
    @if ($linkPemda->isNotEmpty())
      @php $totalPemda = $linkPemda->count(); @endphp
      <div class="relative rounded-b-lg bg-white py-5" x-data="{ current: 0, perPage: 4 }" x-init="perPage = window.innerWidth < 768 ? 2 : window.innerWidth < 1024 ? 3 : 4;
      window.addEventListener('resize', () => { perPage = window.innerWidth < 768 ? 2 : window.innerWidth < 1024 ? 3 : 4; if (current > Math.max(0, {{ $totalPemda }} - perPage)) current = Math.max(0, {{ $totalPemda }} - perPage); })">
        <div class="overflow-hidden px-4 md:px-8">
          <div class="flex transition-transform duration-500"
            :style="'transform: translateX(-' + (current * (100 / perPage)) + '%)'">
            @foreach ($linkPemda as $link)
              <div class="w-1/2 shrink-0 px-2 md:w-1/3 lg:w-1/4">
                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                  class="flex h-36 flex-col items-center justify-center gap-3 rounded-md border border-gray-300 bg-slate-50 p-4 shadow-sm duration-300 hover:-translate-y-1 hover:shadow-lg">
                  @if ($link->gambar)
                    <img src="{{ asset('storage/' . $link->gambar) }}" alt="{{ $link->judul }}"
                      class="max-h-16 w-auto object-contain" />
                  @endif
                  <p class="text-center text-xs font-semibold">{{ $link->judul }}</p>
                </a>
              </div>
            @endforeach
          </div>
        </div>
        @if ($totalPemda > 1)
          <button type="button" x-on:click="current = current > 0 ? current - 1 : 0"
            x-bind:class="current === 0 ? 'opacity-20 cursor-not-allowed' : 'bg-slate-200 hover:bg-slate-300'"
            class="absolute left-0 top-1/2 z-10 -translate-y-1/2 rounded-full p-2 shadow-md"
            style="background-color: #e2e8f0">
            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
          </button>
          <button type="button"
            x-on:click="current = Math.min(current + 1, Math.max(0, {{ $totalPemda }} - perPage))"
            x-bind:class="current >= Math.max(0, {{ $totalPemda }} - perPage) ? 'opacity-20 cursor-not-allowed' :
                'bg-slate-200 hover:bg-slate-300'"
            class="absolute right-0 top-1/2 z-10 -translate-y-1/2 rounded-full p-2 shadow-md"
            style="background-color: #e2e8f0">
            <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </button>
        @endif
      </div>
    @else
      <div class="flex items-center justify-center rounded-b-lg bg-white py-8">
        <p class="text-sm text-slate-400">Belum ada link pemda.</p>
      </div>
    @endif
  </div>
  <!-- LINK PEMDA END -->

</x-app-layout>
