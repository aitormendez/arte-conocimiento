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


  @if ($lineas_de_trabajo)
    <div class="px-4 py-8 my-10 text-sm bg-white lineas-trabajo">
      <div class="px-4 lg:px-0 lg:mx-auto lg:max-w-3xl">
        <h2 class="font-bold">Líneas de trabajo</h2>
        <ul>
          @foreach ($lineas_de_trabajo as $linea)
            <li>
              <a href="{{ $linea['link'] }}">{{ $linea['name'] }}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>      
  @endif

  @if (get_field('pagina_de_usuario', 'user_' . $q->ID))
    <div class="px-4 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
      {!! get_field('pagina_de_usuario', 'user_' . $q->ID)->post_content !!}
    </div>
  @endif

  @query([
    'post_type' => [
      'investigacion',
      'publicacion',
      'transferencia',
      'actividad',
    ],
    'suppress_filters' => false,
    'meta_query' => [
      [
        'key' => 'usuarios_$_nombre_usuario',
        'compare'	=> '=',
        'value'	=> $q->ID,
      ]
    ]
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
