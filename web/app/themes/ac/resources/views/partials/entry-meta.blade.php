<time class="updated" datetime="{{ get_post_time('c', true) }}">
  {{ get_the_date() }}
</time>

@if (is_front_page())
  @php $personas = $personas_front_page($destacado['ID']) @endphp
@endif

@if ($personas)
  <div class="personas">
    @foreach ($personas as $persona)
      @if ($persona['tipo'] === 'usuario')

        <p class="byline author vcard">
          @if (! is_home())
            <a href="{{ $persona['permalink'] }}" rel="author"><span class="fn">{{ $persona['nombre'] }}</span>: <span class="role">{{ $persona['rol']['label'] }}</span></a>
          @else
            {{ $persona['nombre'] }}</span>: <span class="role">{{ $persona['rol']['label'] }}</span>
          @endif

        </p>

      @elseif ($persona['tipo'] === 'participante')

      <p class="byline author vcard">
        <span rel="author" class="fn">{{ $persona['nombre'] }}</span>@if ($persona['rol']['value'] != 'sin_rol'): <span class="role">{{ $persona['rol']['label'] }}</span>@endif      
      @endif
    @endforeach
  </div>
@endif

@dump($taxonomias)





