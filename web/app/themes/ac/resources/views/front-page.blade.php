@extends('layouts.app')

@section('content')
    @dump($destacados)

    <div class="colores">aaaaaabbbb</div>

    @if ($destacados['has_posts'] == true)

    <section id="destacados">
      @foreach ($destacados['posts'] as $destacado)
        @include('partials.destacados-portada')
      @endforeach
    </section>

@endif
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
