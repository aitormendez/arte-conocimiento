@extends('layouts.app')

@section('content')
    @if ($destacados['has_posts'] == true)



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
