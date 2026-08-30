<!-- HEADER START -->
<header class="z-9999 fixed left-0 top-0 w-full transition-colors duration-300" x-data="{
    mobileOpen: false,
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
  @mouseenter="hovered = true" @mouseleave="hovered = false; mobileOpen = false"
  :class="pastHero || hovered || mobileOpen ? 'bg-utama shadow-lg' : (scrolled ? 'bg-utama/30 backdrop-blur-md shadow-md' :
      'lg:bg-transparent bg-utama')">
  <div class="container relative">
    <div class="relative flex items-center justify-between px-4 py-2">
      <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo-dinkominfotik.png') }}" alt="Dinkominfotik" width="150" />
      </a>

      <div class="flex items-center">
        <button @click="mobileOpen = !mobileOpen" type="button"
          class="flex h-10 w-10 flex-col items-center justify-center lg:hidden">
          <span :class="mobileOpen ? 'rotate-45 translate-y-1.25' : ''"
            class="block h-[1.5px] w-5 origin-center bg-white transition-all duration-300"></span>
          <span :class="mobileOpen ? 'scale-0 opacity-0' : ''"
            class="my-1 block h-[1.5px] w-5 bg-white transition-all duration-200"></span>
          <span :class="mobileOpen ? '-rotate-45 -translate-y-1.25' : ''"
            class="block h-[1.5px] w-5 origin-center bg-white transition-all duration-300"></span>
        </button>

        <!-- MOBILE NAV -->
        <nav x-show="mobileOpen" x-transition:enter="transition ease-out duration-200"
          x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
          x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0" @click.outside="mobileOpen = false"
          class="bg-utama absolute right-0 top-full max-h-[80vh] w-full overflow-auto py-3 shadow-lg lg:hidden">
          <ul class="flex w-full flex-col text-white">
            @foreach ($menus as $menu)
              @if ($menu->children->count())
                <li x-data="{ open: false }">
                  <button @click="open = !open"
                    class="flex w-full cursor-pointer items-center justify-between px-5 py-2.5 text-[13px] font-medium transition-colors hover:bg-white/10">
                    {{ $menu->judul }}
                    <svg class="h-3.5 w-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                    </svg>
                  </button>
                  <ul x-show="open" x-collapse>
                    @foreach ($menu->children as $child)
                      <li><a href="{{ $child->getUrl() }}"
                          class="block px-8 py-2 text-[12px] font-medium text-slate-200 hover:bg-white/10">{{ $child->judul }}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li><a href="{{ $menu->getUrl() }}"
                    class="block px-5 py-2.5 text-[13px] font-medium transition-colors hover:bg-white/10">{{ $menu->judul }}</a>
                </li>
              @endif
            @endforeach
          </ul>
        </nav>

        <!-- DESKTOP NAV -->
        <nav class="hidden lg:block">
          <ul class="flex items-center gap-1">
            @foreach ($menus as $menu)
              @if ($menu->children->count())
                <li class="relative" x-data="{ open: false, flip: false }"
                  @mouseenter="open = true; $nextTick(() => { const r = $refs.menu.getBoundingClientRect(); flip = r.left < 0 })"
                  @mouseleave="open = false; flip = false">
                  <button
                    class="flex cursor-pointer items-center gap-1.5 rounded-lg px-3 py-2 text-xs font-medium text-white transition-colors hover:bg-white/10 xl:px-3.5">
                    {{ $menu->judul }}
                    <svg class="h-3 w-3 shrink-0 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                    </svg>
                  </button>
                  <ul x-ref="menu" x-show="open" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="bg-utama min-w-50 absolute top-full z-50 mt-1 rounded-xl py-2 text-white shadow-xl"
                    :class="flip ? 'left-0' : 'right-0'">
                    @foreach ($menu->children as $child)
                      <li><a href="{{ $child->getUrl() }}"
                          class="mx-1 block rounded-lg px-4 py-2 text-xs font-medium hover:bg-white/10">{{ $child->judul }}</a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @else
                <li><a href="{{ $menu->getUrl() }}"
                    class="inline-flex items-center rounded-lg px-3 py-2 text-xs font-medium text-white transition-colors hover:bg-white/10 xl:px-3.5">{{ $menu->judul }}</a>
                </li>
              @endif
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- HEADER END -->
