<x-app-layout>
  <!-- HERO HEADER START -->
  <section class="bg-utama relative overflow-hidden pb-12 pt-28 text-white lg:pb-16 lg:pt-36">
    <div class="pointer-events-none absolute inset-0 opacity-10">
      <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
        <defs>
          <pattern id="bankdata-grid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1" />
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#bankdata-grid)" />
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
        <span class="truncate font-semibold text-white">Bank Data & Publikasi</span>
      </nav>

      <div class="max-w-3xl">
        <h1 class="mb-3 text-2xl font-bold leading-tight text-white md:text-4xl lg:text-5xl">
          Bank Data & Publikasi
        </h1>
        <p class="text-sm leading-relaxed text-blue-100/90 md:text-base">
          Dokumen resmi, data publik, dan publikasi dari Pemerintah Kabupaten Bangka.
        </p>
      </div>
    </div>
  </section>
  <!-- HERO HEADER END -->

  <!-- CONTENT SECTION START -->
  <section class="container mx-auto px-20 py-8 lg:py-12">
    <!-- FILTER BAR & SEARCH -->
    <div
      class="shadow-xs mb-8 flex flex-col items-stretch justify-between gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 md:flex-row md:items-center md:p-6">
      <div class="flex flex-wrap items-center gap-2">
        <a href="{{ route('bank-data.index') }}"
          class="{{ empty($currentTahun) ? 'bg-utama text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }} rounded-xl px-4 py-2 text-xs font-semibold transition-all">
          Semua
        </a>
        @foreach ($availableYears as $year)
          <a href="{{ request()->fullUrlWithQuery(['tahun' => $year]) }}"
            class="{{ $currentTahun === $year ? 'bg-utama text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }} rounded-xl px-4 py-2 text-xs font-semibold transition-all">
            {{ $year }}
          </a>
        @endforeach
      </div>

      <form action="{{ route('bank-data.index') }}" method="GET" class="relative min-w-60 md:w-72">
        @if ($currentTahun)
          <input type="hidden" name="tahun" value="{{ $currentTahun }}">
        @endif
        <div class="relative flex items-center">
          <input type="text" name="q" value="{{ $search }}" placeholder="Cari dokumen..."
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

    <!-- DOCUMENTS LIST -->
    @if ($bankDatas->count() > 0)
      <div class="flex flex-col gap-4">
        @foreach ($bankDatas as $bankData)
          <div
            class="shadow-xs rounded-2xl border border-slate-100 bg-white transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md"
            x-data="{ open: false }">
            <div class="flex flex-col gap-4 p-5 sm:flex-row sm:items-start sm:p-6">
              <!-- Icon -->
              <div class="bg-utama/10 flex h-12 w-12 shrink-0 items-center justify-center rounded-xl">
                <svg class="text-utama h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                </svg>
              </div>

              <!-- Content -->
              <div class="min-w-0 flex-1">
                <div class="mb-1.5 flex flex-wrap items-center gap-2">
                  @if ($bankData->tahun)
                    <span class="rounded-lg bg-blue-50 px-2.5 py-1 text-[11px] font-bold text-blue-700">Tahun
                      {{ $bankData->tahun }}</span>
                  @endif
                  <span class="text-[11px] font-semibold text-slate-400">
                    {{ $bankData->lampiranBankData->count() }}
                    {{ Str::plural('lampiran', $bankData->lampiranBankData->count()) }}
                  </span>
                </div>
                <h3 class="mb-1 text-base font-bold text-slate-800 sm:text-lg">{{ $bankData->judul }}</h3>
                @if ($bankData->deskripsi)
                  <p class="line-clamp-2 text-xs leading-relaxed text-slate-500">{{ $bankData->deskripsi }}</p>
                @endif
              </div>

              <!-- Toggle -->
              @if ($bankData->lampiranBankData->count())
                <button @click="open = !open"
                  class="flex shrink-0 items-center gap-1.5 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-xs font-semibold text-slate-600 transition-colors hover:bg-slate-100">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  <span x-text="open ? 'Tutup' : 'Unduh'"></span>
                  <svg class="h-3 w-3 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
              @endif
            </div>

            <!-- Attachments -->
            @if ($bankData->lampiranBankData->count())
              <div x-show="open" x-collapse x-cloak class="border-t border-slate-100 bg-slate-50/50 px-5 py-4 sm:px-6">
                <div class="flex flex-col gap-2">
                  @foreach ($bankData->lampiranBankData as $lampiran)
                    <div
                      class="flex items-center justify-between rounded-xl border border-slate-200/80 bg-white px-4 py-3 transition-colors hover:border-blue-200">
                      <div class="flex min-w-0 items-center gap-3">
                        @php
                          $ext = strtolower(pathinfo($lampiran->file_name, PATHINFO_EXTENSION));
                          $iconColor = match ($ext) {
                              'pdf' => 'text-red-500 bg-red-50',
                              'xlsx', 'xls', 'csv' => 'text-emerald-600 bg-emerald-50',
                              'docx', 'doc' => 'text-blue-600 bg-blue-50',
                              default => 'text-slate-500 bg-slate-100',
                          };
                        @endphp
                        <span
                          class="{{ $iconColor }} flex h-9 w-9 shrink-0 items-center justify-center rounded-lg text-[10px] font-bold uppercase">
                          {{ $ext }}
                        </span>
                        <div class="min-w-0">
                          <span
                            class="line-clamp-1 block text-xs font-semibold text-slate-700">{{ $lampiran->file_name }}</span>
                          @if ($lampiran->file_size)
                            <span class="text-[10px] text-slate-400">{{ round($lampiran->file_size / 1024, 1) }}
                              KB</span>
                          @endif
                        </div>
                      </div>
                      <a href="{{ route('bank-data.download', $lampiran) }}"
                        class="text-utama flex shrink-0 items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-bold transition-colors hover:bg-blue-50">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Unduh
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div class="mt-10">
        {{ $bankDatas->links() }}
      </div>
    @else
      <div
        class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
        <div class="mb-4 rounded-full bg-slate-100 p-4 text-slate-400">
          <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
          </svg>
        </div>
        <h3 class="text-base font-bold text-slate-800">Tidak ada dokumen ditemukan</h3>
        <p class="mt-1 text-xs text-slate-500">Coba ubah kata kunci pencarian atau pilih tahun lain.</p>
        @if ($search || $currentTahun)
          <a href="{{ route('bank-data.index') }}"
            class="bg-utama mt-4 inline-flex items-center rounded-xl px-4 py-2 text-xs font-semibold text-white">
            Reset Filter
          </a>
        @endif
      </div>
    @endif
  </section>
  <!-- CONTENT SECTION END -->
</x-app-layout>
