@extends('layouts.app')

@section('content')
    @if ($destacados['has_posts'] == true)



    <section id="destacados" class="">
      @foreach ($destacados['posts'] as $destacado)
        @include('partials.content-destacados')
      @endforeach
    </section>

@endif
@endsection

@section('sidebar')
    @include('partials.sidebar')
@endsection
