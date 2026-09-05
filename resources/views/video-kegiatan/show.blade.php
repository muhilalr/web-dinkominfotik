<x-app-layout>
  <!-- HERO HEADER START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="video-detail-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#video-detail-grid)" />
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
        <a href="{{ route('video-kegiatan.index') }}"
          class="shrink-0 text-blue-200/80 transition-colors hover:text-white">
          Video Kegiatan
        </a>
        <span class="text-blue-200/50">&sol;</span>
        <span class="truncate font-semibold text-white">{{ $video->judul }}</span>
      </nav>

      <div class="max-w-4xl">
        <div class="mb-3 flex flex-wrap items-center gap-3">
          <span class="backdrop-blur-xs rounded-lg bg-white/15 px-3 py-1 text-xs font-semibold text-white">
            {{ $video->created_at->translatedFormat('d F Y') }}
          </span>
        </div>
        <h1 class="mb-4 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          {{ $video->judul }}
        </h1>
      </div>
    </div>
  </section>
  <!-- HERO END -->

  <!-- VIDEO CONTENT START -->
  <section class="container mx-auto px-4 py-8 lg:py-12">
    <div class="grid grid-cols-1 items-start gap-8 lg:grid-cols-3">

      <!-- VIDEO PLAYER (2/3) -->
      <div class="lg:col-span-2">
        <div class="overflow-hidden rounded-2xl border border-slate-100 bg-black shadow-lg">
          @if ($video->youtube_embed_url)
            <div class="relative aspect-video w-full">
              <iframe
                src="{{ $video->youtube_embed_url }}"
                title="{{ $video->judul }}"
                class="absolute inset-0 h-full w-full border-0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>
          @else
            <div class="flex aspect-video w-full items-center justify-center bg-slate-900 text-slate-400">
              <p class="text-sm">Video tidak dapat dimuat. URL video tidak valid.</p>
            </div>
          @endif
        </div>

        @if ($video->deskripsi)
          <div class="mt-6 rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <h3 class="mb-3 text-lg font-bold text-slate-800">Deskripsi</h3>
            <div class="prose prose-slate max-w-none text-sm text-slate-600 leading-relaxed">
              {!! nl2br(e($video->deskripsi)) !!}
            </div>
          </div>
        @endif
      </div>
      <!-- VIDEO PLAYER END -->

      <!-- SIDEBAR START -->
      <aside class="flex flex-col gap-6 lg:col-span-1">
        <!-- Back to listing -->
        <a href="{{ route('video-kegiatan.index') }}"
          class="shadow-xs hover:text-utama flex items-center gap-2 rounded-2xl border border-slate-100 bg-white px-5 py-4 text-sm font-semibold text-slate-700 transition-all hover:border-blue-200">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Kembali ke Daftar Video
        </a>

        <!-- Video Info -->
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
          <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
            <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Informasi Video
          </h3>
          <dl class="space-y-3 text-sm">
            <div class="flex items-start gap-3">
              <dt class="w-20 shrink-0 text-xs font-semibold text-slate-500">Judul</dt>
              <dd class="text-xs font-medium text-slate-800">{{ $video->judul }}</dd>
            </div>
            <div class="flex items-start gap-3">
              <dt class="w-20 shrink-0 text-xs font-semibold text-slate-500">Tanggal</dt>
              <dd class="text-xs font-medium text-slate-800">{{ $video->created_at->translatedFormat('d F Y') }}</dd>
            </div>
          </dl>
        </div>

        <!-- Related Videos -->
        @if ($related->count())
          <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <h3 class="mb-4 flex items-center gap-2 border-b border-slate-100 pb-3 text-base font-bold text-slate-800">
              <svg class="text-utama h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
              Video Lainnya
            </h3>
            <ul class="space-y-4">
              @foreach ($related as $item)
                <li>
                  <a href="{{ route('video-kegiatan.show', $item->slug) }}" class="group flex gap-3">
                    <div class="relative h-16 w-24 shrink-0 overflow-hidden rounded-lg bg-slate-900">
                      <img
                        src="{{ $item->youtube_thumbnail_url }}"
                        alt="{{ $item->judul }}"
                        class="h-full w-full object-cover" />
                      <div class="absolute inset-0 flex items-center justify-center">
                        <div class="flex h-6 w-6 items-center justify-center rounded-full bg-black/60 text-white">
                          <svg class="ml-0.5 h-3 w-3 fill-current" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="min-w-0 flex-1">
                      <h4 class="group-hover:text-utama line-clamp-2 text-xs font-bold text-slate-700">
                        {{ $item->judul }}
                      </h4>
                      <span class="mt-1 block text-[11px] text-slate-400">
                        {{ $item->created_at->translatedFormat('d M Y') }}
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
  <!-- VIDEO CONTENT END -->
</x-app-layout>
