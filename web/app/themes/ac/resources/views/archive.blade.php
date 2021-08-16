@extends('layouts.app')

@section('content')
  @include('partials.page-header')



  @if (! have_posts())
    <div class="px-4 mb-6 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
      <x-alert type="warning">
        {!! __('Aquí no hay nada aún.', 'sage') !!}
      </x-alert>
      {!! get_search_form(false) !!}
    </div>
  @endif

  @if (have_posts())
    <div class="infinite-scroll-container">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content']) 
      @endwhile
    </div>
  @endif


  {!! get_the_posts_navigation() !!}

  @include('partials.page-load-infscroll')
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
