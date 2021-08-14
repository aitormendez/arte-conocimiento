{{--
  Template Name: Equipo
--}}

@extends('layouts.app')



@section('content')

  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <div class="lg:mx-auto lg:max-w-3xl">
      @include('partials.content-page')
    </div>
  @endwhile

  <ul class="mt-24 equipo">
    @foreach ($equipo as $miembro)
    <li class="mb-4 miembro">
      <a href="{{ $miembro['link'] }}" class="block pt-4 bg-white md:pt-0 normal hover:bg-gray-400">
        <div class="lg:mx-auto lg:max-w-3xl md:flex">
          <div class="order-1 text-sm prose datos md:pt-4">
            <h2>{{ $miembro['persona']['display_name'] }}</h2>
            <div class="user-description">

              @wpautop($miembro['persona']['user_description'] )
            </div>
          </div>
          @if ($miembro['foto'])
          <div class="flex-shrink-0 foto md:mr-4 md:w-1/4">
            <img class="w-full" src="{{ $miembro['foto']['url'] }}" alt="{{ $miembro['foto']['alt'] }}" srcset="{{ $miembro['srcset'] }}" sizes="(max-width: 768px) 100vw, (max-width: 1024px) 20vw, 10vw">
          </div>
          @endif
        </div>
      </a>
    </li>
  
    @endforeach
  </ul>
@endsection
