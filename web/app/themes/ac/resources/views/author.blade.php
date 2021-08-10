@php
  $q = get_queried_object();
@endphp

@extends('layouts.app')

@section('content')

  @if ($foto['foto'])
    <figure class="px-4 mb-4 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
      <img src="{{ $foto['foto']['url'] }}" alt="{{ $foto['foto']['alt'] }}" srcset="{{ $foto['srcset'] }}" sizes="(max-width: 768px) 100vw, 30vw"/>
    </figure>
  @endif


  
  @include('partials.page-header')


  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @if (get_field('pagina_de_usuario', 'user_' . $q->ID))
    <div class="px-4 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
      {!! get_field('pagina_de_usuario', 'user_' . $q->ID)->post_content !!}
    </div>
  @endif

  @dump($q->data->user_nicename)

  @query([
    'post_type' => [
      'investigacion',
      'publicacion',
      'transferencia',
      'actividad',
    ],
    // 'meta_query' => [
    //   [
    //     'key'		=> 'usuarios_$_nombre_usuario',
    //     'compare'	=> '=',
    //     'value'	=> $q->data->user_nicename,
    //   ]
    // ]
  ])



  @if ($query->have_posts())
  <section>
    <header class="px-4 mb-4 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
      <h2>Participa en:</h2>
    </header>
    <div class="infinite-scroll-container">
      @while($query->have_posts()) @php($query->the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content']) 
      @endwhile
    </div>
  </section>
  @endif


  {!! get_the_posts_navigation() !!}

  @include('partials.page-load-infscroll')
@endsection

@section('sidebar')
  @include('partials.sidebar')
@endsection
