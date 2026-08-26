<!-- HEADER START -->
    <header class="fixed top-0 left-0 w-full z-9999 transition-colors duration-300"
      x-data="{
        mobileOpen: false,
        dd: { profil: false, berita: false, layanan: false, ppid: false },
        hovered: false,
        scrolled: false,
        pastHero: false,
        init() {
          const update = () => {
            this.scrolled = window.scrollY > 10
            this.pastHero = window.scrollY > (window.innerHeight - 60)
          }
          update()
          window.addEventListener('scroll', update)
        }
      }"
      @mouseenter="hovered = true"
      @mouseleave="hovered = false; mobileOpen = false"
      :class="pastHero || hovered || mobileOpen ? 'bg-utama shadow-lg' : (scrolled ? 'bg-utama/30 backdrop-blur-md shadow-md' : 'lg:bg-transparent bg-utama')"
    >
      <div class="container relative">
        <div class="flex items-center justify-between relative px-4 py-2">
          <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo-dinkominfotik.png') }}" alt="Dinkominfotik" width="150" />
          </a>

          <div class="flex items-center">
            <button @click="mobileOpen = !mobileOpen" type="button" class="flex flex-col justify-center items-center w-10 h-10 lg:hidden">
              <span :class="mobileOpen ? 'rotate-45 translate-y-1.25' : ''" class="block w-5 h-[1.5px] bg-white transition-all duration-300 origin-center"></span>
              <span :class="mobileOpen ? 'scale-0 opacity-0' : ''" class="block w-5 h-[1.5px] bg-white transition-all duration-200 my-1"></span>
              <span :class="mobileOpen ? '-rotate-45 -translate-y-1.25' : ''" class="block w-5 h-[1.5px] bg-white transition-all duration-300 origin-center"></span>
            </button>

            <!-- MOBILE NAV -->
            <nav x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.outside="mobileOpen = false" class="absolute py-3 bg-utama shadow-lg w-full right-0 top-full lg:hidden overflow-auto max-h-[80vh]">
              <ul class="flex flex-col w-full text-white">
                <li><a href="{{ url('/') }}" class="block py-2.5 px-5 text-[13px] font-medium hover:bg-white/10 transition-colors">HOME</a></li>
                <li>
                  <button @click="dd.profil = !dd.profil" class="w-full py-2.5 px-5 text-[13px] font-medium flex items-center justify-between hover:bg-white/10 transition-colors cursor-pointer">
                    PROFIL <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="dd.profil ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.profil" x-collapse class="bg-black/20">
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Struktur Organisasi</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Tugas Pokok dan Fungsi</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Renstra</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Dokumen Perencanaan</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Laporan SKM</a></li>
                  </ul>
                </li>
                <li>
                  <button @click="dd.berita = !dd.berita" class="w-full py-2.5 px-5 text-[13px] font-medium flex items-center justify-between hover:bg-white/10 transition-colors cursor-pointer">
                    BERITA & INFORMASI <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="dd.berita ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.berita" x-collapse class="bg-black/20">
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Berita</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Artikel</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Foto Gallery</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Video Gallery</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Publikasi</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Bank Data</a></li>
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Produk Hukum</a></li>
                  </ul>
                </li>
                <li><a href="#" class="block py-2.5 px-5 text-[13px] font-medium hover:bg-white/10 transition-colors">PENGUMUMAN</a></li>
                <li><a href="#" class="block py-2.5 px-5 text-[13px] font-medium hover:bg-white/10 transition-colors">BANK DATA</a></li>
                <li>
                  <button @click="dd.layanan = !dd.layanan" class="w-full py-2.5 px-5 text-[13px] font-medium flex items-center justify-between hover:bg-white/10 transition-colors cursor-pointer">
                    LAYANAN <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="dd.layanan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.layanan" x-collapse class="bg-black/20">
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Dulang Emas</a></li>
                  </ul>
                </li>
                <li>
                  <button @click="dd.ppid = !dd.ppid" class="w-full py-2.5 px-5 text-[13px] font-medium flex items-center justify-between hover:bg-white/10 transition-colors cursor-pointer">
                    PPID <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="dd.ppid ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.ppid" x-collapse class="bg-black/20">
                    <li><a href="#" class="block py-2 px-8 text-[12px] font-medium text-slate-200 hover:bg-white/10">Profil PPID</a></li>
                  </ul>
                </li>
              </ul>
            </nav>

            <!-- DESKTOP NAV -->
            <nav class="hidden lg:block">
              <ul class="flex items-center gap-1">
                <li><a href="{{ url('/') }}" class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 hover:bg-white/10 rounded-lg transition-colors inline-flex items-center">HOME</a></li>
                <!-- PROFIL -->
                <li class="relative" @mouseenter="dd.profil = true" @mouseleave="dd.profil = false">
                  <button class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 flex items-center gap-1.5 hover:bg-white/10 rounded-lg transition-colors cursor-pointer">
                    PROFIL <svg class="w-3 h-3 shrink-0 transition-transform duration-200" :class="dd.profil ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.profil" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute left-0 top-full mt-1 bg-utama text-white py-2 shadow-xl rounded-xl min-w-50 z-50">
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Struktur Organisasi</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Tugas Pokok dan Fungsi</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Renstra</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Dokumen Perencanaan</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Laporan SKM</a></li>
                  </ul>
                </li>
                <!-- BERITA -->
                <li class="relative" @mouseenter="dd.berita = true" @mouseleave="dd.berita = false">
                  <button class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 flex items-center gap-1.5 hover:bg-white/10 rounded-lg transition-colors cursor-pointer">
                    BERITA & INFORMASI <svg class="w-3 h-3 shrink-0 transition-transform duration-200" :class="dd.berita ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.berita" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute left-0 top-full mt-1 bg-utama text-white py-2 shadow-xl rounded-xl min-w-45 z-50">
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Berita</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Artikel</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Foto Gallery</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Video Gallery</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Publikasi</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Bank Data</a></li>
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Produk Hukum</a></li>
                  </ul>
                </li>
                <li><a href="#" class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 hover:bg-white/10 rounded-lg transition-colors inline-flex items-center">PENGUMUMAN</a></li>
                <li><a href="#" class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 hover:bg-white/10 rounded-lg transition-colors inline-flex items-center">BANK DATA</a></li>
                <!-- LAYANAN -->
                <li class="relative" @mouseenter="dd.layanan = true" @mouseleave="dd.layanan = false">
                  <button class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 flex items-center gap-1.5 hover:bg-white/10 rounded-lg transition-colors cursor-pointer">
                    LAYANAN <svg class="w-3 h-3 shrink-0 transition-transform duration-200" :class="dd.layanan ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.layanan" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute left-0 top-full mt-1 bg-utama text-white py-2 shadow-xl rounded-xl min-w-37.5 z-50">
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Dulang Emas</a></li>
                  </ul>
                </li>
                <!-- PPID -->
                <li class="relative" @mouseenter="dd.ppid = true" @mouseleave="dd.ppid = false">
                  <button class="text-white text-[11px] font-medium px-3 xl:px-3.5 py-2 flex items-center gap-1.5 hover:bg-white/10 rounded-lg transition-colors cursor-pointer">
                    PPID <svg class="w-3 h-3 shrink-0 transition-transform duration-200" :class="dd.ppid ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                  </button>
                  <ul x-show="dd.ppid" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute right-0 top-full mt-1 bg-utama text-white py-2 shadow-xl rounded-xl min-w-37.5 z-50">
                    <li><a href="#" class="block px-4 py-2 text-[11px] font-medium hover:bg-white/10 rounded-lg mx-1">Profil PPID</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER END -->
