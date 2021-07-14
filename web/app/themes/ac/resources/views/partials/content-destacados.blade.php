<article class="p-4 mb-6 lg:mb-0 {{ $destacado['post_type'] }} {{ $destacado['tamano'] }} {{ $destacado['formato'] }} relative">

  {{-- IMAGEN --}}

  <a href="{{ $destacado['link'] }}" class="flex flex-wrap w-full">
    <header class="w-full col-datos md:flex md:flex-col md:justify-between">
      <div class="arriba">
        <div class="text-sm font-bold tracking-widest uppercase">{{ $destacado['post_type'] }}</div>
        <h2 class="my-6 text-2xl tracking-wider">{{ $destacado['title'] }}</h2>
      </div>
      <div class="entry-meta">
        @include('partials/entry-meta')
      </div>
    </header>
    @if ($destacado['contenido'] === 'imagen')
      @if ($destacado['has_img'])
        <div class="abajo img">
          <img src="{!! $destacado['url'] !!}" srcset="{!! $destacado['srcset'] !!}" alt="{!! $destacado['alt'] !!}" sizes="(max-width: 768px) 100vw, 40vw">
        </div>
      @endif
    @endif
    @if ($destacado['contenido'] === 'texto')
      @if ($destacado['has_txt'])
        <div class="abajo txt">
          {!! $destacado['txt'] !!}
        </div>
      @endif
    @endif
  </a>


</article>

