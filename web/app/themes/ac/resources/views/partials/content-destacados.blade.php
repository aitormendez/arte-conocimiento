<article class="flex-none p-4 mb-4 md:mb-0 {{ $destacado['post_type'] }} {{ $destacado['tamano'] }} {{ $destacado['formato'] }} relative">

  {{-- IMAGEN --}}

  <a href="{{ $destacado['link'] }}" class="flex flex-wrap justify-between text-black bg-white hover:text-black interior">
    <div class="arriba">
      <header class="w-full p-4">
          <div class="text-sm font-bold tracking-widest uppercase tipo">{{ $destacado['post_type'] }}</div>
          <h2 class="my-6 text-2xl tracking-wider">{{ $destacado['title'] }}</h2>
      </header>
    </div>
    @if ($destacado['contenido'] === 'imagen')
      @if ($destacado['has_img'])
        <div class="abajo img">
          <img class="" src="{!! $destacado['url'] !!}" srcset="{!! $destacado['srcset'] !!}" alt="{!! $destacado['alt'] !!}" sizes="(max-width: 768px) 100vw, 40vw">
        </div>
      @endif
    @endif
    @if ($destacado['contenido'] === 'texto')
      @if ($destacado['has_txt'])
        <div class="p-4 abajo txt">
          {!! $destacado['txt'] !!}
        </div>
      @endif
    @endif
    <div class="meta">
      @include('partials/entry-meta')
    </div>
  </a>


</article>

