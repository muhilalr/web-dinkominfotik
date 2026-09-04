<x-app-layout>
  <!-- HERO HEADER START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="galeri-detail-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#galeri-detail-grid)" />
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
        <a href="{{ route('galeri-foto.index') }}"
          class="shrink-0 text-blue-200/80 transition-colors hover:text-white">
          Galeri Foto
        </a>
        <span class="text-blue-200/50">&sol;</span>
        <span class="truncate font-semibold text-white">{{ $galeri->judul }}</span>
      </nav>

      <div class="max-w-4xl">
        <div class="mb-3 flex flex-wrap items-center gap-3">
          @if ($galeri->event_date)
            <span class="backdrop-blur-xs rounded-lg bg-white/15 px-3 py-1 text-xs font-semibold text-white">
              {{ $galeri->event_date->translatedFormat('d F Y') }}
            </span>
          @endif
          <span class="text-xs text-blue-200/80">
            {{ $galeri->foto->count() }} {{ Str::plural('foto', $galeri->foto->count()) }}
          </span>
        </div>
        <h1 class="mb-4 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          {{ $galeri->judul }}
        </h1>
      </div>
    </div>
  </section>
  <!-- HERO END -->

  <!-- GALLERY CONTENT START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">

      <!-- PHOTO GRID (2/3) -->
      <div class="lg:col-span-2" x-data="galleryLightbox()">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
          @foreach ($galeri->foto as $index => $foto)
            <button
              @click="open({{ $index }})"
              class="group relative cursor-pointer overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
              <div class="aspect-[4/3] w-full overflow-hidden bg-slate-100">
                <img
                  src="{{ asset('storage/' . $foto->gambar) }}"
                  alt="{{ $galeri->judul }} - Foto {{ $loop->iteration }}"
                  class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                  loading="lazy" />
              </div>
              <div
                class="absolute inset-0 flex items-center justify-center bg-slate-900/0 transition-colors duration-300 group-hover:bg-slate-900/20">
                <div
                  class="flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-slate-700 opacity-0 shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:opacity-100">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                  </svg>
                </div>
              </div>
            </button>
          @endforeach
        </div>

        <!-- Lightbox Modal -->
        <template x-teleport="body">
          <div x-show="isOpen" x-cloak
            class="fixed inset-0 z-[10000] flex items-center justify-center bg-slate-950/90 p-4 backdrop-blur-sm"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @keydown.escape.window="close()">
            <!-- Close Button -->
            <button @click="close()"
              class="absolute right-4 top-4 z-10 flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-white/20 focus:outline-none">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

            <!-- Previous Button -->
            <button @click="prev()"
              class="absolute left-4 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-white/20 focus:outline-none">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
            </button>

            <!-- Next Button -->
            <button @click="next()"
              class="absolute right-4 top-1/2 z-10 flex h-12 w-12 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 text-white transition-colors hover:bg-white/20 focus:outline-none">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </button>

            <!-- Image -->
            <div class="relative max-h-[85vh] max-w-5xl" @click.stop>
              <img
                :src="images[currentIndex]"
                :alt="'Foto ' + (currentIndex + 1)"
                class="max-h-[85vh] rounded-lg object-contain shadow-2xl"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" />
              <!-- Counter -->
              <div
                class="absolute bottom-4 left-1/2 -translate-x-1/2 rounded-full bg-slate-900/70 px-4 py-1.5 text-xs font-medium text-white backdrop-blur-sm">
                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
              </div>
            </div>
          </div>
        </template>
      </div>
      <!-- PHOTO GRID END -->

      <!-- SIDEBAR START -->
      <aside class="flex flex-col gap-6 lg:col-span-1">
        <!-- Back to listing -->
        <a href="{{ route('galeri-foto.index') }}"
          class="shadow-xs hover:text-utama flex items-center gap-2 rounded-2xl border border-slate-100 bg-white px-5 py-4 text-sm font-semibold text-slate-700 transition-all hover:border-blue-200">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Kembali ke Galeri
        </a>

        <!-- Gallery Info -->
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
          <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
            <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Informasi Galeri
          </h3>
          <dl class="space-y-3 text-sm">
            <div class="flex items-start gap-3">
              <dt class="w-20 shrink-0 text-xs font-semibold text-slate-500">Judul</dt>
              <dd class="text-xs font-medium text-slate-800">{{ $galeri->judul }}</dd>
            </div>
            @if ($galeri->event_date)
              <div class="flex items-start gap-3">
                <dt class="w-20 shrink-0 text-xs font-semibold text-slate-500">Tanggal</dt>
                <dd class="text-xs font-medium text-slate-800">{{ $galeri->event_date->translatedFormat('d F Y') }}</dd>
              </div>
            @endif
            <div class="flex items-start gap-3">
              <dt class="w-20 shrink-0 text-xs font-semibold text-slate-500">Jumlah</dt>
              <dd class="text-xs font-medium text-slate-800">{{ $galeri->foto->count() }} {{ Str::plural('foto', $galeri->foto->count()) }}</dd>
            </div>
          </dl>
        </div>

        <!-- Related Galleries -->
        @if ($related->count())
          <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
              <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Galeri Lainnya
            </h3>
            <ul class="space-y-4">
              @foreach ($related as $item)
                <li>
                  <a href="{{ route('galeri-foto.show', $item->slug) }}" class="group flex gap-3">
                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-lg bg-slate-100">
                      @if ($item->foto->isNotEmpty())
                        <img
                          src="{{ asset('storage/' . $item->foto->first()->gambar) }}"
                          alt="{{ $item->judul }}"
                          class="h-full w-full object-cover" />
                      @else
                        <div class="flex h-full w-full items-center justify-center text-slate-300">
                          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                          </svg>
                        </div>
                      @endif
                    </div>
                    <div class="min-w-0 flex-1">
                      <h4 class="group-hover:text-utama line-clamp-2 text-xs font-bold text-slate-700">
                        {{ $item->judul }}
                      </h4>
                      <span class="mt-1 block text-[11px] text-slate-400">
                        {{ $item->event_date?->translatedFormat('d M Y') ?? '' }}
                        &bull; {{ $item->foto->count() }} foto
                      </span>
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif
      </aside>
      <!-- SIDEBAR END -->

    </div>
  </section>
  <!-- GALLERY CONTENT END -->

  @push('scripts')
    <script>
      function galleryLightbox() {
        return {
          isOpen: false,
          currentIndex: 0,
          images: @js($galeri->foto->map(fn ($f) => asset('storage/' . $f->gambar))->toArray()),
          open(index) {
            this.currentIndex = index;
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
          },
          close() {
            this.isOpen = false;
            document.body.style.overflow = '';
          },
          next() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
          },
          prev() {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
          },
        };
      }
    </script>
  @endpush
</x-app-layout>
