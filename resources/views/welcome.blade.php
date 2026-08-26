<x-app-layout>
    <!-- JUMBOTRON START -->
    <section x-data="{ current: 0, total: 5 }" x-init="setInterval(() => { current = (current + 1) % total }, 4000)">
      <div class="mt-16 lg:mt-0 relative h-72 md:h-screen overflow-hidden">
        <div
          x-show="current === 0"
          x-transition:enter="transition ease-in-out duration-1000"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-1000"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute inset-0 bg-cover bg-no-repeat bg-center"
          style="background-image: url('{{ asset('img/view-1.jfif') }}')"
        ></div>
        <div
          x-show="current === 1"
          x-transition:enter="transition ease-in-out duration-1000"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-1000"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute inset-0 bg-cover bg-no-repeat bg-center"
          style="background-image: url('{{ asset('img/view-2.jfif') }}'); display: none;"
        ></div>
        <div
          x-show="current === 2"
          x-transition:enter="transition ease-in-out duration-1000"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-1000"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute inset-0 bg-cover bg-no-repeat bg-center"
          style="background-image: url('{{ asset('img/view-3.jfif') }}'); display: none;"
        ></div>
        <div
          x-show="current === 3"
          x-transition:enter="transition ease-in-out duration-1000"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-1000"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute inset-0 bg-cover bg-no-repeat bg-center"
          style="background-image: url('{{ asset('img/view-4.jfif') }}'); display: none;"
        ></div>
        <div
          x-show="current === 4"
          x-transition:enter="transition ease-in-out duration-1000"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition ease-in-out duration-1000"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          class="absolute inset-0 bg-cover bg-no-repeat bg-center"
          style="background-image: url('{{ asset('img/view-5.jfif') }}'); display: none;"
        ></div>
        <div id="home" class="relative z-10 flex flex-col gap-4 items-center justify-center w-full h-full bg-black/60 text-white lg:gap-12">
          <h1 class="font-bold text-base text-center leading-relaxed lg:text-4xl">
            MENJAWAB KEBUTUHAN INFORMASI <br />
            PUBLIK WARGA BANGKA
          </h1>
          <div class="flex flex-col gap-4 w-full items-center justify-center max-w-sm lg:max-w-2xl lg:gap-7">
            <p class="font-medium w-full text-sm text-center text-white lg:text-base">
              Temukan informasi publik terkini dari Pemerintah Kabupaten Bangka
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- JUMBOTRON END -->

    <!-- BERITA & INFORMASI START -->
    <section class="container mx-auto px-4 py-8">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">

        <!-- MAIN NEWS / HEADLINE & CATEGORIES (COL SPAN 2) -->
        <div class="lg:col-span-2 flex flex-col gap-6 h-full">
          <!-- HEADLINE NEWS START -->
          <div class="relative overflow-hidden rounded-2xl shadow-lg group h-95 md:h-105">
            <img
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
              src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg"
              alt="Headline News Image"
            />
            <div class="absolute inset-0 bg-linear-to-t from-slate-950/90 via-slate-900/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8 text-white">
              <div class="flex items-center gap-2 mb-3">
                <span class="bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Headline</span>
                <span class="text-xs text-slate-300">Sosial &bull; 20 Jam Yang Lalu</span>
              </div>
              <h2 class="font-bold text-base md:text-2xl lg:text-3xl leading-snug mb-3 hover:text-blue-300 transition-colors">
                <a href="#">Pj Bupati M Haris Keluarkan SE Netralitas ASN di Pemkab Bangka, Poin 4 Silahkan Lapor Si Lapis Legit</a>
              </h2>
              <p class="text-sm text-slate-300 line-clamp-2 mb-4 hidden md:block">
                Pemerintah Kabupaten Bangka mempertegas netralitas Aparatur Sipil Negara (ASN) dalam menghadapi pemilu dengan menerbitkan Surat Edaran resmi.
              </p>
              <a href="#" class="inline-flex items-center gap-2 bg-utama hover:bg-blue-900 text-white text-xs md:text-sm font-semibold px-5 py-2.5 rounded-lg shadow transition-all">
                Baca Selengkapnya
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
              </a>
            </div>
          </div>
          <!-- HEADLINE NEWS END -->

          <!-- BERITA & ARTIKEL CATEGORY TABS START -->
          <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col flex-1" x-data="{ activeTab: 'berita' }">
            <div>
              <ul class="flex text-sm font-bold text-center border-b border-slate-200">
                <li class="w-1/2">
                  <button
                    @click="activeTab = 'berita'"
                    :class="activeTab === 'berita' ? 'bg-utama text-white' : 'bg-slate-50 text-utama hover:bg-slate-100'"
                    class="w-full py-3.5 px-4 text-sm md:text-base transition-colors duration-200 uppercase tracking-wider flex items-center justify-center gap-2"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    BERITA TERKINI
                  </button>
                </li>
                <li class="w-1/2">
                  <button
                    @click="activeTab = 'artikel'"
                    :class="activeTab === 'artikel' ? 'bg-utama text-white' : 'bg-slate-50 text-utama hover:bg-slate-100'"
                    class="w-full py-3.5 px-4 text-sm md:text-base transition-colors duration-200 uppercase tracking-wider flex items-center justify-center gap-2"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    ARTIKEL
                  </button>
                </li>
              </ul>
            </div>

            <div class="p-4 sm:p-5 flex flex-col flex-1">
              <!-- LIST BERITA -->
              <div x-show="activeTab === 'berita'" x-cloak class="space-y-2 flex flex-col flex-1">
                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="Berita Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-2 py-0.5 rounded mb-1 inline-block">Kesehatan</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Jumlah Anak Stunting di Desa Gunung Muda Kabupaten Bangka Menurun Drastis</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">20 Jam Yang Lalu &bull; Oleh Admin</p>
                  </div>
                </div>

                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="Berita Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded mb-1 inline-block">Pemerintahan</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Pemkab Bangka Gelar Rakor Evaluasi Kinerja Penyelenggaraan Pemerintahan Daerah</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">1 Hari Yang Lalu &bull; Oleh Diskominfo</p>
                  </div>
                </div>

                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="Berita Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded mb-1 inline-block">Sosial</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Sosialisasi Program Perlindungan Jaminan Sosial Masyarakat Bangka</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">2 Hari Yang Lalu &bull; Oleh Humas</p>
                  </div>
                </div>

                <div class="pt-3 border-t border-slate-100 text-center mt-auto">
                  <a href="#" class="inline-flex items-center gap-1.5 text-xs font-semibold text-utama hover:text-blue-900 bg-slate-50 hover:bg-slate-100 px-5 py-2 rounded-xl border border-slate-200 transition-all">
                    Lihat Selengkapnya Berita
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                  </a>
                </div>
              </div>

              <!-- LIST ARTIKEL -->
              <div x-show="activeTab === 'artikel'" x-cloak class="space-y-2 flex flex-col flex-1">
                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="Artikel Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-2 py-0.5 rounded mb-1 inline-block">Opini</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Wacana Pemotongan TPP ASN dan Gaji Honorer Bangka, Gemilang Akan Surati Pj Gubernur dan Mendagri</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">2 Hari Yang Lalu &bull; Oleh Redaksi</p>
                  </div>
                </div>

                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="Artikel Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-2 py-0.5 rounded mb-1 inline-block">Teknologi</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Strategi Akselerasi Transformasi Digital Pelayanan Publik Kabupaten Bangka</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">3 Hari Yang Lalu &bull; Oleh Tim IT</p>
                  </div>
                </div>

                <div class="flex-1 flex flex-col sm:flex-row gap-3 p-3 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                  <img class="w-full sm:w-36 h-24 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="Artikel Image" />
                  <div class="flex flex-col justify-between py-0.5 flex-1">
                    <div>
                      <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-2 py-0.5 rounded mb-1 inline-block">Edukasi</span>
                      <h3 class="font-bold text-slate-800 text-sm hover:text-utama transition-colors line-clamp-2">
                        <a href="#">Pentingnya Keterbukaan Informasi Publik dalam Menjaga Transparansi Tata Kelola Daerah</a>
                      </h3>
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">5 Hari Yang Lalu &bull; Oleh PPID Utama</p>
                  </div>
                </div>

                <div class="pt-3 border-t border-slate-100 text-center mt-auto">
                  <a href="#" class="inline-flex items-center gap-1.5 text-xs font-semibold text-utama hover:text-blue-900 bg-slate-50 hover:bg-slate-100 px-5 py-2 rounded-xl border border-slate-200 transition-all">
                    Lihat Selengkapnya Artikel
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- BERITA & ARTIKEL CATEGORY TABS END -->
        </div>

        <!-- SIDEBAR: BERITA CAMPURAN (TERBARU & TERPOPULER) & BANK DATA START -->
        <div class="lg:col-span-1 flex flex-col gap-6 h-full">
          <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex-1 flex flex-col" x-data="{ tab: 'terbaru' }">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-5">
              <h3 class="font-bold text-slate-800 text-base md:text-lg">Informasi Bangka</h3>
              <div class="flex bg-slate-100 p-1 rounded-xl">
                <button
                  @click="tab = 'terbaru'"
                  :class="tab === 'terbaru' ? 'bg-white text-utama shadow-sm font-bold' : 'text-slate-500 hover:text-slate-800 font-medium'"
                  class="text-xs px-3 py-1.5 rounded-lg transition-all"
                >
                  Terbaru
                </button>
                <button
                  @click="tab = 'terpopuler'"
                  :class="tab === 'terpopuler' ? 'bg-white text-utama shadow-sm font-bold' : 'text-slate-500 hover:text-slate-800 font-medium'"
                  class="text-xs px-3 py-1.5 rounded-lg transition-all"
                >
                  Terpopuler
                </button>
              </div>
            </div>

            <!-- TAB CONTENT: TERBARU -->
            <div x-show="tab === 'terbaru'" x-cloak class="space-y-4">
              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded">Berita</span>
                    <span class="text-[10px] text-slate-400">3 Jam Lalu</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Jumlah Anak Stunting di Desa Gunung Muda Kabupaten Bangka Menurun Drastis
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-1.5 py-0.5 rounded">Artikel</span>
                    <span class="text-[10px] text-slate-400">5 Jam Lalu</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Wacana Pemotongan TPP ASN dan Gaji Honorer Bangka
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded">Berita</span>
                    <span class="text-[10px] text-slate-400">12 Jam Lalu</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Pj Bupati M Haris Keluarkan SE Netralitas ASN di Pemkab Bangka
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-1.5 py-0.5 rounded">Artikel</span>
                    <span class="text-[10px] text-slate-400">1 Hari Lalu</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Strategi Akselerasi Transformasi Digital Pelayanan Publik Kabupaten Bangka
                  </h4>
                </div>
              </a>
            </div>

            <!-- TAB CONTENT: TERPOPULER -->
            <div x-show="tab === 'terpopuler'" x-cloak class="space-y-4">
              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded">Berita</span>
                    <span class="text-[10px] text-slate-400">2.4k views</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Pj Bupati M Haris Keluarkan SE Netralitas ASN di Pemkab Bangka
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-1.5 py-0.5 rounded">Artikel</span>
                    <span class="text-[10px] text-slate-400">1.8k views</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Wacana Pemotongan TPP ASN dan Gaji Honorer Bangka
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-blue-600 bg-blue-50 px-1.5 py-0.5 rounded">Berita</span>
                    <span class="text-[10px] text-slate-400">1.2k views</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Jumlah Anak Stunting di Desa Gunung Muda Kabupaten Bangka Menurun Drastis
                  </h4>
                </div>
              </a>

              <a href="#" class="group flex gap-3 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                <img class="w-20 h-16 rounded-lg object-cover shrink-0" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="" />
                <div class="flex flex-col">
                  <div class="flex items-center gap-1.5 mb-1">
                    <span class="text-[10px] font-semibold text-purple-600 bg-purple-50 px-1.5 py-0.5 rounded">Artikel</span>
                    <span class="text-[10px] text-slate-400">950 views</span>
                  </div>
                  <h4 class="font-semibold text-xs sm:text-sm text-slate-800 group-hover:text-utama line-clamp-2 transition-colors">
                    Inovasi Layanan Publik Dulang Emas Dinkominfotik Bangka
                  </h4>
                </div>
              </a>
            </div>
          </div>

          <!-- BANK DATA SECTION START -->
          <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 flex-1">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4 mb-4">
              <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-utama flex items-center justify-center">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"/></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-lg">Bank Data & Publikasi</h3>
              </div>
            </div>

            <p class="text-xs text-slate-500 mb-4">Daftar dokumen resmi dan publikasi data Kabupaten Bangka.</p>

            <div class="space-y-4">
              <!-- Item 1 -->
              <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 hover:border-blue-200 hover:bg-blue-50/30 transition-all">
                <a href="#" class="font-bold text-xs sm:text-sm text-slate-800 hover:text-utama line-clamp-2 transition-colors block mb-2">
                  Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP) Tahun 2023
                </a>
                <div class="flex items-center justify-between pt-2 border-t border-slate-200/60 text-[11px]">
                  <span class="text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                    1 Lampiran (PDF)
                  </span>
                  <a href="#" class="font-semibold text-utama hover:underline flex items-center gap-1">
                    Unduh
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                  </a>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 hover:border-blue-200 hover:bg-blue-50/30 transition-all">
                <a href="#" class="font-bold text-xs sm:text-sm text-slate-800 hover:text-utama line-clamp-2 transition-colors block mb-2">
                  Bangka Dalam Angka & Buku Data Statistik Sektoral Kominfo 2024
                </a>
                <div class="flex items-center justify-between pt-2 border-t border-slate-200/60 text-[11px]">
                  <span class="text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                    2 Lampiran (PDF, XLSX)
                  </span>
                  <a href="#" class="font-semibold text-utama hover:underline flex items-center gap-1">
                    Unduh
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                  </a>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/80 hover:border-blue-200 hover:bg-blue-50/30 transition-all">
                <a href="#" class="font-bold text-xs sm:text-sm text-slate-800 hover:text-utama line-clamp-2 transition-colors block mb-2">
                  Dokumen Rencana Strategis (Renstra) Dinkominfotik 2021-2026
                </a>
                <div class="flex items-center justify-between pt-2 border-t border-slate-200/60 text-[11px]">
                  <span class="text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                    1 Lampiran (PDF)
                  </span>
                  <a href="#" class="font-semibold text-utama hover:underline flex items-center gap-1">
                    Unduh
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                  </a>
                </div>
              </div>
            </div>

            <a href="#" class="mt-5 block text-center text-xs font-bold text-utama hover:underline">
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
        <template x-for="(img, index) in [
          '{{ asset('img/banner-1.jpg') }}',
          '{{ asset('img/banner-2.jpg') }}',
          '{{ asset('img/banner-3.jpg') }}'
        ]" :key="index">
          <div
            x-show="current === index"
            x-transition:enter="transition ease-in-out duration-700"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-700"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0"
          >
            <img :src="img" class="block w-full h-full object-cover" :alt="'Banner ' + (index + 1)" />
          </div>
        </template>
      </div>

      <!-- Slider indicators -->
      <div class="absolute z-30 flex -translate-x-1/2 bottom-10 left-1/2 space-x-3">
        <template x-for="i in total" :key="i">
          <button
            type="button"
            @click="current = i - 1"
            :class="current === i - 1 ? 'bg-white' : 'bg-white/50'"
            class="w-3 h-3 rounded-full"
            :aria-label="'Slide ' + i"
          ></button>
        </template>
      </div>

      <!-- Slider controls -->
      <button type="button" class="absolute top-0 inset-s-6 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="current = (current - 1 + total) % total">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 focus:ring-4 focus:ring-white">
          <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button" class="absolute top-0 inset-e-6 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" @click="current = (current + 1) % total">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 focus:ring-4 focus:ring-white">
          <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
    <!-- CAROUSEL END -->

    <!-- FOTO KEGIATAN START -->
    <section class="container mx-auto px-4 py-8">
      <div class="flex flex-col items-center md:flex-row md:justify-between gap-4 mb-8">
        <div class="flex flex-col items-center md:items-start gap-1">
          <span class="text-xs font-bold text-utama uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full">Galeri Dokumentasi</span>
          <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2">Foto-Foto Kegiatan</h2>
        </div>
        <a href="#" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-utama hover:text-blue-900 bg-white border border-slate-200 px-5 py-2.5 rounded-xl shadow-sm hover:shadow transition-all w-fit">
          Lihat Semua Foto
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Foto 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="Foto Kegiatan" />
            <div class="absolute top-3 right-3 bg-slate-900/60 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-md">
              18 Okt 2024
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Peninjauan Langsung Penanganan Stunting oleh Pj Bupati Bangka di Desa Gunung Muda</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Kegiatan kunjungan kerja dan penyerahan bantuan secara langsung kepada keluarga penerima manfaat.
            </p>
          </div>
        </div>

        <!-- Foto 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="Foto Kegiatan" />
            <div class="absolute top-3 right-3 bg-slate-900/60 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-md">
              15 Okt 2024
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Rapat Koordinasi Penguatan Netralitas ASN Pemkab Bangka</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Sosialisasi edaran netralitas ASN dan pembekalan pengawasan internal di lingkungan Pemkab Bangka.
            </p>
          </div>
        </div>

        <!-- Foto 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52">
            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="Foto Kegiatan" />
            <div class="absolute top-3 right-3 bg-slate-900/60 backdrop-blur-md text-white text-xs px-2.5 py-1 rounded-md">
              12 Okt 2024
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Audensi Bersama Tokoh Masyarakat Mengenai Kebijakan Daerah</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Diskusi terbuka dalam rangka penyampaian aspirasi masyarakat terkait program pembangunan daerah.
            </p>
          </div>
        </div>
      </div>
      <div class="mt-8 flex justify-center md:hidden">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-utama hover:text-blue-900 bg-white border border-slate-200 px-5 py-2.5 rounded-xl shadow-sm hover:shadow transition-all w-fit">
              Lihat Semua Foto
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
      </div>
    </section>
    <!-- FOTO KEGIATAN END -->

    <!-- VIDEO PUBLIKASI START -->
    <section class="container mx-auto px-4 py-8">
      <div class="flex flex-col items-center md:flex-row md:justify-between gap-4 mb-8">
        <div class="flex flex-col items-center md:items-start gap-1">
          <span class="text-xs font-bold text-utama uppercase tracking-wider bg-blue-50 px-3 py-1 rounded-full">Media Multimedia</span>
          <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-2">Video Publikasi</h2>
        </div>
        <a href="#" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-utama hover:text-blue-900 bg-white border border-slate-200 px-5 py-2.5 rounded-xl shadow-sm hover:shadow transition-all w-fit">
          Lihat Semua Video
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Video 1 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52 bg-slate-900">
            <img class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/20240620-Pj-Bupati-Bangka-M-Haris123.jpg" alt="Video Thumbnail" />
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="w-12 h-12 rounded-full bg-utama/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
              </div>
            </div>
            <div class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-medium px-2 py-0.5 rounded">
              03:45
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Profil Pelayanan Informasi Publik Dinkominfotik Bangka 2024</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Video singkat komitmen dan berbagai inovasi layanan informasi publik di Kabupaten Bangka.
            </p>
          </div>
        </div>

        <!-- Video 2 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52 bg-slate-900">
            <img class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Haris-tinjau-anak-stunting-di-Gunung-Muda.jpg" alt="Video Thumbnail" />
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="w-12 h-12 rounded-full bg-utama/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
              </div>
            </div>
            <div class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-medium px-2 py-0.5 rounded">
              05:20
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Dokumentasi Program Penurunan Stunting Terpadu Kabupaten Bangka</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Liputan khusus aksi konvergensi pencegahan stunting oleh tim gabungan Pemkab Bangka.
            </p>
          </div>
        </div>

        <!-- Video 3 -->
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 group hover:shadow-md transition-all">
          <div class="relative overflow-hidden h-52 bg-slate-900">
            <img class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition-transform duration-500" src="https://asset-2.tstatic.net/bangka/foto/bank/images/Kabid-Polhukam-Gemilang-Ardin-Hulu.jpg" alt="Video Thumbnail" />
            <div class="absolute inset-0 flex items-center justify-center">
              <div class="w-12 h-12 rounded-full bg-utama/90 text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
              </div>
            </div>
            <div class="absolute bottom-3 right-3 bg-slate-950/80 text-white text-[10px] font-medium px-2 py-0.5 rounded">
              02:15
            </div>
          </div>
          <div class="p-5">
            <h3 class="font-bold text-slate-800 text-base group-hover:text-utama line-clamp-2 transition-colors mb-2">
              <a href="#">Tutorial Penggunaan Layanan Dulang Emas Dinkominfotik</a>
            </h3>
            <p class="text-xs text-slate-500 line-clamp-2">
              Panduan penggunaan portal Dulang Emas untuk masyarakat Kabupaten Bangka.
            </p>
          </div>
        </div>
      </div>
      <div class="mt-8 flex justify-center md:hidden">
          <a href="#" class="inline-flex items-center gap-2 text-sm font-semibold text-utama hover:text-blue-900 bg-white border border-slate-200 px-5 py-2.5 rounded-xl shadow-sm hover:shadow transition-all w-fit">
              Lihat Semua Video
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
      </div>
    </section>
    <!-- VIDEO PUBLIKASI END -->

    <!-- PENGUMUMAN DAN LINK TERKAIT START -->
    <div class="container mx-auto p-5 flex flex-col md:flex-row gap-5">
      <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 border-b-2 border-blue-500 pb-3 mb-5 uppercase tracking-wide">
          Pengumuman
        </h2>
        <div class="announcement mb-5">
          <img class="w-full rounded-lg mb-3 shadow-md object-cover" src="{{ asset('img/banner-1.jpg') }}" alt="Gambar Pengumuman" />
          <h3 class="text-2xl text-blue-500 font-bold mb-3">
            Sosialisasi Program Perlindungan Jaminan Sosial
          </h3>
          <p class="text-sm text-gray-500 mb-2">18/10/2024 | Dinkominfotik</p>
          <p class="text-base text-gray-700">
            Sosialisasi ini bertujuan untuk memberikan pemahaman mengenai pentingnya perlindungan jaminan sosial bagi masyarakat. Acara ini dihadiri oleh berbagai lapisan masyarakat dan narasumber dari lembaga terkait.
          </p>
        </div>
      </div>

      <div class="md:w-1/3 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 border-b-2 border-blue-500 pb-3 mb-5 uppercase tracking-wide">
          Link Terkait
        </h2>
        <div class="flex flex-col gap-4">
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="http://sidikjari.bangka.go.id">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xfinger_0.png.pagespeed.ic.0yU9yIn3fa.webp" alt="Sidik Jari" />
            </a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="http://bangka.go.id">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xWEB,P20BANGKA.png.pagespeed.ic.k8iB-kBOsS.webp" alt="Bangka" />
            </a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="https://satudata.bangka.go.id">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xSATU,P20DATA_0.png.pagespeed.ic.skSGNnc9YX.webp" alt="Satu Data" />
            </a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="https://www.lapor.go.id/">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xLAPOR.png.pagespeed.ic.kNG7j29pcW.webp" alt="Lapor" />
            </a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="https://lpse.bangka.go.id/eproc4">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xLPSE1.png.pagespeed.ic.TfyZEWL04s.webp" alt="LPSE" />
            </a>
          </div>
          <div class="bg-white p-4 rounded-lg border border-gray-300 shadow-sm hover:shadow-lg transition-transform transform hover:-translate-y-1">
            <a href="https://pesonadukcapil.bangka.go.id/">
              <img class="w-full rounded-lg" src="https://dinkominfotik.bangka.go.id/sites/default/files/link/xPESONA,P20DUKCPIL..jpg.pagespeed.ic.0EPVyK3fnf.webp" alt="Pesona Dukcapil" />
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- PENGUMUMAN DAN LINK TERKAIT END -->

    <!-- LINK PEMDA START -->
    <div class="container mx-auto mt-7 px-4">
      <div class="bg-utama p-4 px-8 rounded-t-lg">
        <h1 class="text-white font-bold text-xl">Link Pemda Lainnya</h1>
      </div>
      <div class="bg-white py-5 flex flex-col items-center justify-center rounded-b-lg gap-5 md:flex-row md:gap-5 md:px-8">
        <div class="w-full flex items-center justify-evenly md:w-auto md:justify-center md:gap-5">
          <a href="https://babelprov.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/prov_babel.png') }}" alt="Provinsi Kepulauan Bangka Belitung" width="120" />
            <p class="text-xs text-center font-semibold">Provinsi Kepulauan<br />Bangka Belitung</p>
          </a>
          <a href="https://pangkalpinangkota.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kota_pangkalpinang.png') }}" alt="Kota Pangkalpinang" width="120" />
            <p class="text-xs text-center font-semibold">Kota<br />Pangkalpinang</p>
          </a>
        </div>
        <div class="w-full flex items-center justify-evenly md:w-auto md:justify-center md:gap-5">
          <a href="https://belitung.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kab_belitung.png') }}" alt="Kabupaten Belitung" width="120" />
            <p class="text-xs text-center font-semibold">Kabupaten<br />Belitung</p>
          </a>
          <a href="https://bangkabaratkab.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kab_bangkabarat.png') }}" alt="Kabupaten Bangka Barat" width="120" />
            <p class="text-xs text-center font-semibold">Kabupaten<br />Bangka Barat</p>
          </a>
        </div>
        <div class="w-full flex items-center justify-evenly md:w-auto md:justify-center md:gap-5">
          <a href="https://bangkatengahkab.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kab_bangkatengah.png') }}" alt="Kabupaten Bangka Tengah" width="120" />
            <p class="text-xs text-center font-semibold">Kabupaten<br />Bangka Tengah</p>
          </a>
          <a href="https://bangkaselatankab.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kab_bangkaselatan.png') }}" alt="Kabupaten Bangka Selatan" width="120" />
            <p class="text-xs text-center font-semibold">Kabupaten<br />Bangka Selatan</p>
          </a>
        </div>
        <div class="w-full flex items-center justify-evenly md:w-auto md:justify-center">
          <a href="https://portal.beltim.go.id/" class="bg-slate-50 flex flex-col items-center justify-center gap-3 border border-gray-300 shadow-sm p-4 rounded-md hover:shadow-lg duration-300 hover:-translate-y-1">
            <img src="{{ asset('img/kab_belitungtimur.png') }}" alt="Kabupaten Belitung Timur" width="120" />
            <p class="text-xs text-center font-semibold">Kabupaten<br />Belitung Timur</p>
          </a>
        </div>
      </div>
    </div>
    <!-- LINK PEMDA END -->
</x-app-layout>
