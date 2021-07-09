<time class="updated" datetime="{{ get_post_time('c', true) }}">
  {{ get_the_date() }}
</time>

@foreach ($personas as $persona)
  @if ($persona['tipo'] === 'usuario')

    <p class="byline author vcard">
      <a href="{{ $persona['permalink'] }}" rel="author"><span class="fn">{{ $persona['nombre'] }}</span>: <span class="role">{{ $persona['rol']['label'] }}</span></a>
    </p>

  @elseif ($persona['tipo'] === 'participante')

  <p class="byline author vcard">
    <span rel="author" class="fn">{{ $persona['nombre'] }}</span>@if ($persona['rol']['value'] != 'sin_rol'): <span class="role">{{ $persona['rol']['label'] }}</span>@endif      
  @endif
    
@endforeach


