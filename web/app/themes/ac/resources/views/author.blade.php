@extends('layouts.app')

@section('content')
  @include('partials.page-header')


  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif


  <div class="px-4 prose lg:px-0 entry-content lg:mx-auto lg:max-w-3xl">
    {!! get_field('pagina_de_usuario', 'user_' . get_queried_object()->ID)->post_content !!}
  </div>


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
