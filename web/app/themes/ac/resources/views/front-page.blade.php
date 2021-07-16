@extends('layouts.app')

@section('content')
    @if ($destacados['has_posts'] == true)

    <div id="button-group" class="hidden ml-3 md:block button-group filter-button-group">
      <button class="px-3 py-2 m-1 text-xs tracking-wider uppercase border border-black  hover:bg-white" data-filter="*">todos</button>
      @foreach ($destacados['filtros'] as $filtro)
        <button class="px-3 py-2 m-1 text-xs tracking-wider uppercase border border-black hover:bg-white" data-filter=".{{ $filtro }}">{{ $filtro }}</button>
      @endforeach
    </div>

    <section id="destacados" class="">
      <article class="cuadrado pequeño">
        <div class="h-full p-4 interior">
          <a href="#" class="flex items-center h-full p-4 font-bold tracking-widest text-center text-black uppercase transition duration-500 border-8 border-black hover:text-white color-ya hover:border-white">
            <span class="block">Revista Accesos</span>
          </a>
        </div>
      </article>
      @foreach ($destacados['posts'] as $destacado)
        @include('partials.content-destacados')
      @endforeach
    </section>

@endif
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
