<x-app-layout>
    <!-- PAGE HEADER HERO START -->
    <section class="relative pt-28 pb-12 lg:pt-36 lg:pb-16 bg-utama overflow-hidden text-white">
        <!-- Background Pattern Decor -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none">
                <defs>
                    <pattern id="page-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="currentColor" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#page-grid)"/>
            </svg>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs text-blue-100/80 mb-4 font-medium uppercase tracking-wider overflow-x-auto whitespace-nowrap pb-1">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors flex items-center gap-1 shrink-0">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Beranda
                </a>
                <span class="text-blue-200/50">&sol;</span>
                <span class="text-blue-200/80 shrink-0">{{ $category ?? 'Halaman' }}</span>
                <span class="text-blue-200/50">&sol;</span>
                <span class="text-white font-semibold truncate">{{ $page->title ?? $title ?? 'Judul Halaman' }}</span>
            </nav>

            <!-- Page Title & Meta -->
            <div class="max-w-4xl">
                <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold leading-tight text-white mb-4">
                    {{ $page->title ?? $title ?? 'Visi & Misi Dinas Komunikasi, Informatika dan Statistik' }}
                </h1>
                
                @if(isset($page->updated_at) || isset($updatedAt))
                    <div class="flex items-center gap-4 text-xs text-blue-100/90 pt-2 border-t border-white/10">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Diperbarui: {{ isset($page) ? $page->updated_at->translatedFormat('d F Y') : ($updatedAt ?? now()->translatedFormat('d F Y')) }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Oleh: Dinkominfotik Bangka
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- PAGE HEADER HERO END -->

    <!-- MAIN CONTENT SECTION START -->
    <section class="container mx-auto px-4 py-8 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- LEFT MAIN ARTICLE CONTENT (COL SPAN 2) -->
            <main class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-10">
                @if(isset($page->featured_image) || isset($featuredImage))
                    <div class="mb-8 rounded-xl overflow-hidden shadow-sm border border-slate-100">
                        <img 
                            src="{{ $page->featured_image ?? $featuredImage }}" 
                            alt="{{ $page->title ?? $title ?? 'Featured Image' }}"
                            class="w-full h-auto max-h-105 object-cover"
                        />
                    </div>
                @endif

                <!-- Dynamic Content Container -->
                <article class="prose prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-800 prose-p:text-slate-600 prose-p:leading-relaxed prose-a:text-utama prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl prose-img:border prose-img:border-slate-100">
                    @if(isset($page->content))
                        {!! $page->content !!}
                    @else
                        <!-- Placeholder/Fallback Content -->
                        <div class="space-y-6">
                            <p class="text-base text-slate-700 leading-relaxed">
                                Halaman ini menyajikan informasi resmi terkait Dinas Komunikasi, Informatika dan Statistik Kabupaten Bangka. Kami berkomitmen menyediakan tata kelola pemerintahan yang transparan dan akuntabel.
                            </p>

                            <h2 class="text-xl font-bold text-slate-800 border-b border-slate-200 pb-2 mt-6">
                                Vision & Mission Statement
                            </h2>

                            <div class="bg-blue-50/50 border-l-4 border-utama p-5 rounded-r-xl my-6">
                                <h3 class="text-base font-bold text-utama mb-2">Visi Kabupaten Bangka</h3>
                                <p class="text-slate-700 italic text-sm md:text-base">
                                    &ldquo;Terwujudnya Kabupaten Bangka yang Sejahtera, Maju, dan Berkelanjutan Melalui Tata Kelola Pemerintahan Digital.&rdquo;
                                </p>
                            </div>

                            <h3 class="text-lg font-bold text-slate-800 mt-6 mb-3">Misi Utama:</h3>
                            <ul class="list-disc pl-5 space-y-2 text-slate-600">
                                <li>Meningkatkan kualitas pelayanan publik berbasis Teknologi Informasi dan Komunikasi (TIK).</li>
                                <li>Mewujudkan keterbukaan informasi publik yang transparan dan terpercaya.</li>
                                <li>Memperkuat infrastruktur digital dan keamanan siber daerah.</li>
                                <li>Mengoptimalkan pengelolaan data statistik sektoral untuk pembangunan terpadu.</li>
                            </ul>

                            <hr class="my-8 border-slate-100" />

                            <!-- Attachments or Documents if applicable -->
                            <div class="bg-slate-50 rounded-xl p-5 border border-slate-200/80">
                                <h4 class="font-bold text-slate-800 text-sm mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-utama" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                    </svg>
                                    Dokumen Pendukung / Lampiran
                                </h4>
                                <div class="flex items-center justify-between p-3 bg-white rounded-lg border border-slate-200 text-xs">
                                    <span class="font-medium text-slate-700 truncate pr-2">Dokumen_Resmi_Informasi_Publik.pdf</span>
                                    <a href="#" class="bg-utama hover:bg-blue-900 text-white font-semibold px-3 py-1.5 rounded transition-colors shrink-0 inline-flex items-center gap-1">
                                        Unduh
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </article>

                <!-- Page Share Footer -->
                <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Bagikan Informasi Ini:</span>
                    <div class="flex items-center gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-90 transition-opacity" title="Facebook">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-sky-500 text-white flex items-center justify-center hover:opacity-90 transition-opacity" title="Twitter">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-951.555.564-2.005.974-3.127 1.195a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.936 9.936 0 0024 4.59z"/></svg>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center hover:opacity-90 transition-opacity" title="WhatsApp">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99 0-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                        </a>
                    </div>
                </div>
            </main>
            <!-- LEFT MAIN ARTICLE END -->

            <!-- RIGHT SIDEBAR START -->
            <aside class="lg:col-span-1 flex flex-col gap-6">
                <!-- Navigation Widget / Related Pages -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
                    <h3 class="font-bold text-slate-800 text-base border-b border-slate-100 pb-3 mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-utama" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                        </svg>
                        Menu Profil
                    </h3>
                    <ul class="space-y-1.5 text-xs font-medium">
                        <li>
                            <a href="#" class="block px-3 py-2.5 rounded-lg bg-blue-50 text-utama font-bold border-l-4 border-utama transition-all">
                                Tugas Pokok dan Fungsi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 hover:text-utama transition-all">
                                Struktur Organisasi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 hover:text-utama transition-all">
                                Rencana Strategis (Renstra)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 hover:text-utama transition-all">
                                Dokumen Perencanaan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-3 py-2.5 rounded-lg text-slate-600 hover:bg-slate-50 hover:text-utama transition-all">
                                Laporan SKM
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Quick Services Widget -->
                <div class="bg-linear-to-br from-utama to-blue-900 rounded-2xl shadow-sm p-6 text-white">
                    <h3 class="font-bold text-lg mb-2">Layanan Informasi</h3>
                    <p class="text-xs text-blue-100/90 leading-relaxed mb-4">
                        Akses layanan informasi publik dan portal pengaduan resmi Pemkab Bangka.
                    </p>
                    <a href="https://www.lapor.go.id" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full py-2.5 bg-white text-utama font-bold text-xs rounded-xl shadow-md hover:bg-blue-50 transition-colors gap-2">
                        Lapor SP4N!
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </aside>
            <!-- RIGHT SIDEBAR END -->

        </div>
    </section>
    <!-- MAIN CONTENT SECTION END -->
</x-app-layout>
