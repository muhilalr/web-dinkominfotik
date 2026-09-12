<footer class="container bg-utama mt-16 px-10 pt-6 pb-10 flex flex-col md:flex-row md:justify-between md:pb-6 md:items-center">
  <a href="{{ url('/') }}">
    <img src="{{ !empty($siteSetting?->logo) ? asset('storage/' . $siteSetting->logo) : asset('img/logo-dinkominfotik.png') }}"
      alt="" width="250" />
  </a>

  <div class="flex flex-col mt-4 md:mt-0 md:border-l-2 md:border-slate-500 md:pl-3">
    <p class="font-bold text-white">Alamat :</p>
    <p class="font-normal text-sm text-slate-300">{{ $siteSetting?->alamat ?? 'Alamat belum diatur' }}</p>
  </div>

  <div class="flex flex-col mt-6 md:mt-0 md:border-l-2 md:border-slate-500 md:pl-3">
    <p class="font-bold text-white">Kontak :</p>
    @if (!empty($siteSetting?->telepon))
      <p class="font-normal text-sm text-slate-300">Telp. {{ $siteSetting->telepon }}</p>
    @endif
    @if (!empty($siteSetting?->email))
      <p class="font-normal text-sm text-slate-300">Email : {{ $siteSetting->email }}</p>
    @endif
  </div>
</footer>
