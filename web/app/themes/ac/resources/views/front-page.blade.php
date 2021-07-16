@extends('layouts.app')

@section('content')
    @if ($destacados['has_posts'] == true)



    <section id="destacados" class="">
      <article class="cuadrado pequeño">
        <div class="h-full p-4 interior">
          <div class="flex items-center h-full p-4 font-bold tracking-widest text-center uppercase border-8 border-black color-ya">
            <span class="block">Revista Accesos</span>
          </div>
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
