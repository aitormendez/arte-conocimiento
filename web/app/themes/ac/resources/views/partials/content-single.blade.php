@php
    $clase = $taxonomias['localizacion'] ? 'mapa' : '';
@endphp
<article @php post_class($clase) @endphp >

  <header>
    
    <div class="px-4 lg:px-0 lg:mx-auto lg:max-w-3xl">

      @if (has_post_thumbnail())
        <div class="mb-6 thumb md:max-w-xs">@thumbnail('large')</div>
      @endif

      <h1 class="text-4xl font-extrabold entry-title">{!! $title !!}</h1>
      
    </div>

    <div class="mt-8 overflow-hidden bg-white">
      <div class="flex items-center pl-4 cursor-pointer lg:px-0 info lg:mx-auto lg:max-w-3xl">
        info <span class="mx-3 fas fa-angle-right fa-2x"></span>
      </div>
      <div class="meta">
        <div class="px-4 pt-4 leading-tight lg:px-0 wrap md:flex md:justify-start">
          @include('partials/entry-meta')
        </div>
      </div>
    </div>

  </header>

  @if (is_singular('actividad') && $taxonomias['localizacion'])
    <div id="map" class="w-full" zoom="{{$taxonomias['localizacion']['zoom']  }}" lat="{{$taxonomias['localizacion']['lat']  }}" lng="{{$taxonomias['localizacion']['lng']  }}"></div>
  @endif

  <div class="px-4 mt-12 prose lg:px-0 entry-content lg:mx-auto lg:max-w-3xl">
    @php(the_content())
  </div>

  @php(comments_template())
</article>
