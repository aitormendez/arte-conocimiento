{{--
  Template Name: Contacto
--}}

@extends('layouts.app')



@section('content')


  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <div class="lg:mx-auto lg:max-w-3xl">
      @include('partials.content-page')





      
    </div>

 
    
    <div class="py-4 bg-white border-t border-black dir">
      <div class="lg:mx-auto lg:max-w-3xl">
        <h3 class="font-bold">Universidad Complutense de Madrid</h3>
        <h4 class="mb-3 font-bold">Facultad de Bellas artes</h4>
        <p class="m-0">{{ $loc['street_name'] }}, {{ $loc['street_number'] }}</p>
        <p class="m-0">{{ $loc['post_code'] }} {{ $loc['city'] }}</p>
        <p class="m-0">{{ $loc['state'] }}</p>
        <p class="m-0">{{ $loc['country'] }}</p>
          </li>
        </ul>
      </div>
    </div>

    <div id="map" class="border-b border-black map f-full"  zoom="{{$loc['zoom']  }}" lat="{{$loc['lat']  }}" lng="{{$loc['lng']  }}"></div>
  @endwhile


@endsection
