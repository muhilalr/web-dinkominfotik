<x-app-layout>
  <!-- PAGE HEADER HERO START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="post-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#post-grid)" />
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
        <a href="{{ route($tipe === 'berita' ? 'posts.berita' : 'posts.artikel') }}"
          class="shrink-0 text-blue-200/80 transition-colors hover:text-white">
          {{ $tipe === 'berita' ? 'Berita' : 'Artikel' }}
        </a>
        @if ($post->kategori)
          <span class="text-blue-200/50">&sol;</span>
          <a href="{{ route($tipe === 'berita' ? 'posts.berita' : 'posts.artikel') }}?kategori={{ $post->kategori->slug }}"
            class="shrink-0 text-blue-200/80 transition-colors hover:text-white">
            {{ $post->kategori->nama }}
          </a>
        @endif
        <span class="text-blue-200/50">&sol;</span>
        <span class="truncate font-semibold text-white">{{ $post->judul }}</span>
      </nav>

      <!-- Title & Meta -->
      <div class="max-w-4xl">
        <div class="mb-3 flex flex-wrap items-center gap-3">
          @if ($post->kategori)
            <span class="backdrop-blur-xs rounded-lg bg-white/15 px-3 py-1 text-xs font-semibold text-white">
              {{ $post->kategori->nama }}
            </span>
          @endif
          <span class="text-xs text-blue-200/80">
            {{ $post->tipe === 'berita' ? 'Berita' : 'Artikel' }}
          </span>
        </div>
        <h1 class="mb-4 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          {{ $post->judul }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 border-t border-white/10 pt-3 text-xs text-blue-100/90">
          <span class="flex items-center gap-1.5">
            <svg class="h-4 w-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            {{ $post->published_at?->translatedFormat('d F Y') ?? $post->created_at->translatedFormat('d F Y') }}
          </span>
          <span class="flex items-center gap-1.5">
            <svg class="h-4 w-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Dinkominfotik Bangka
          </span>
          <span class="flex items-center gap-1.5">
            <svg class="h-4 w-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            {{ number_format($post->views) }} views
          </span>
        </div>
      </div>
    </div>
  </section>
  <!-- HERO END -->

  <!-- MAIN CONTENT SECTION START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">

      <!-- LEFT MAIN CONTENT (2/3) -->
      <main class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm md:p-10 lg:col-span-2">
        <!-- Featured Image -->
        @if ($post->thumbnail)
          <div class="mb-8 overflow-hidden rounded-xl border border-slate-100 shadow-sm">
            <img
              src="{{ Str::startsWith($post->thumbnail, ['http://', 'https://']) ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
              alt="{{ $post->judul }}" class="max-h-105 h-auto w-full object-contain" />
          </div>
        @endif

        <!-- Article Content -->
        <article
          class="prose prose-slate prose-headings:font-bold prose-headings:text-slate-800 prose-p:text-slate-600 prose-p:leading-relaxed prose-a:text-utama prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl prose-img:border prose-img:border-slate-100 max-w-none">
          {!! $post->konten !!}
        </article>

        <!-- Share Footer -->
        <div class="mt-10 flex flex-col items-center justify-between gap-4 border-t border-slate-100 pt-6 sm:flex-row">
          <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">Bagikan Informasi Ini:</span>
          <div class="flex items-center gap-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank"
              rel="noopener noreferrer"
              class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-600 text-white transition-opacity hover:opacity-90"
              title="Facebook">
              <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                <path
                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank"
              rel="noopener noreferrer"
              class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-500 text-white transition-opacity hover:opacity-90"
              title="Twitter">
              <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                <path
                  d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-951.555.564-2.005.974-3.127 1.195a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.936 9.936 0 0024 4.59z" />
              </svg>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank"
              rel="noopener noreferrer"
              class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-500 text-white transition-opacity hover:opacity-90"
              title="WhatsApp">
              <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                <path
                  d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99 0-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
              </svg>
            </a>
          </div>
        </div>
      </main>
      <!-- LEFT END -->

      <!-- RIGHT SIDEBAR START -->
      <aside class="flex flex-col gap-6 lg:col-span-1">
        <!-- Back to listing -->
        <a href="{{ route($tipe === 'berita' ? 'posts.berita' : 'posts.artikel') }}"
          class="shadow-xs hover:text-utama flex items-center gap-2 rounded-2xl border border-slate-100 bg-white px-5 py-4 text-sm font-semibold text-slate-700 transition-all hover:border-blue-200">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Lihat Semua {{ $tipe === 'berita' ? 'Berita' : 'Artikel' }}
        </a>

        <!-- Related Posts -->
        @if ($relatedPosts->count())
          <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
              <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
              Berita Terkait
            </h3>
            <ul class="space-y-4">
              @foreach ($relatedPosts as $related)
                <li>
                  <a href="{{ route('posts.show', ['tipe' => $related->tipe, 'slug' => $related->slug]) }}"
                    class="group flex gap-3">
                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-lg bg-slate-100">
                      @if ($related->thumbnail)
                        <img
                          src="{{ Str::startsWith($related->thumbnail, ['http://', 'https://']) ? $related->thumbnail : asset('storage/' . $related->thumbnail) }}"
                          alt="{{ $related->judul }}" class="h-full w-full object-contain" />
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
                        {{ $related->judul }}
                      </h4>
                      <span class="mt-1 block text-[11px] text-slate-400">
                        {{ $related->published_at?->translatedFormat('d M Y') ?? $related->created_at->translatedFormat('d M Y') }}
                      </span>
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Latest Posts -->
        @if ($otherPosts->count())
          <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
              <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $tipe === 'berita' ? 'Berita' : 'Artikel' }} Lainnya
            </h3>
            <ul class="space-y-3">
              @foreach ($otherPosts as $other)
                <li>
                  <a href="{{ route('posts.show', ['tipe' => $other->tipe, 'slug' => $other->slug]) }}"
                    class="hover:text-utama group block rounded-lg px-3 py-2.5 text-xs font-medium text-slate-600 transition-all hover:bg-slate-50">
                    {{ $other->judul }}
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Services Widget -->
        <div class="bg-linear-to-br from-utama rounded-2xl to-blue-900 p-6 text-white shadow-sm">
          <h3 class="mb-2 text-lg font-bold">Layanan Informasi</h3>
          <p class="mb-4 text-xs leading-relaxed text-blue-100/90">
            Akses layanan informasi publik dan portal pengaduan resmi Pemkab Bangka.
          </p>
          <a href="https://www.lapor.go.id" target="_blank" rel="noopener noreferrer"
            class="text-utama inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white py-2.5 text-xs font-bold shadow-md transition-colors hover:bg-blue-50">
            Lapor SP4N!
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>
      </aside>
      <!-- RIGHT SIDEBAR END -->

    </div>
  </section>
  <!-- MAIN CONTENT SECTION END -->
</x-app-layout>
