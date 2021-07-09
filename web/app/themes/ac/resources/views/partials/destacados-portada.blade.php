<article class="mb-6 {{ $destacado['post_type'] }} {{ $destacado['formato'] }}">

  {{-- IMAGEN --}}
  @if ($destacado['contenido'] === 'imagen')
    <a href="{{ $destacado['link'] }}" class="flex flex-wrap w-full">
      <header class="w-full p-6 col-datos md:flex md:flex-col md:justify-between">
        <div class="arriba">
          <div class="font-serif text-lg font-bold capitalize meta">{{ $destacado['post_type'] }}</div>
          <h2 class="my-6 text-2xl tracking-widest">{{ $destacado['title'] }}</h2>
        </div>
        <div class="tracking-wide excerpt">
          {!! $destacado['excerpt'] !!}
        </div>
      </header>
      @if ($destacado['has_img'])
        <div class="img">
          <img src="{!! $destacado['url'] !!}" srcset="{!! $destacado['srcset'] !!}" alt="{!! $destacado['alt'] !!}" sizes="(max-width: 768px) 100vw, 40vw">
        </div>
      @endif
    </a>
  @endif

</article>

