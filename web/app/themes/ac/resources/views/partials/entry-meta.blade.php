<div class="bloque" id="bloque-1">
    @if (is_front_page())
      @php
        $personas = $personas_front_page($destacado['ID']);
        $taxonomias = $taxonomias_front_page($destacado['ID'])
      @endphp

      <div class="mb-3 fechas">
        <time class="block" datetime="{{ get_post_time('c', true, $destacado['ID']) }}">
          Publicado el {{ get_the_date('j/n/Y', $destacado['ID']) }}
        </time>
        @if (get_field('post_fecha_inicio', $destacado['ID']))
            <div>Inicio {{ get_field('post_fecha_inicio', $destacado['ID']) }}</div>
        @endif
        @if (get_field('post_fecha_fin', $destacado['ID']))
            <div>Fin {{ get_field('post_fecha_fin', $destacado['ID']) }}</div>
        @endif
      </div>
    @else
      <div class="mb-3 fechas">
        <time class="inline-block updated" datetime="{{ get_post_time('c', true) }}">
          Publicado el {{ get_the_date('j/n/Y') }}
        </time>
        @if (get_field('post_fecha_inicio'))
            <div>Inicio {{ get_field('post_fecha_inicio') }}</div>
        @endif
        @if (get_field('post_fecha_fin'))
            <div>Fin {{ get_field('post_fecha_fin') }}</div>
        @endif
      </div>
    @endif

  
  @if ($personas)
    <div class="mb-3 personas">
      @foreach ($personas as $persona)
        @if ($persona['tipo'] === 'usuario')
  
          <p class="my-0 mb-2 byline author vcard">
            @if (! is_home())
              <a href="{{ $persona['permalink'] }}" class="" rel="author"><span class="fn">{{ $persona['nombre'] }}</span></a><i class="block rol">{{ $persona['rol']['label'] }}</i>
            @else
              {{ $persona['nombre'] }}</span><i class="block rol"">{{ $persona['rol']['label'] }}</i>
            @endif
  
          </p>
  
        @elseif ($persona['tipo'] === 'participante')
  
        <p class="mb-2 byline author vcard">
          <span rel="author" class="fn">{{ $persona['nombre'] }}</span>@if ($persona['rol']['value'] != 'sin_rol')<i class="block rol">{{ $persona['rol']['label'] }}</i>@endif
        @endif
      @endforeach
    </div>
  @endif
</div>

@if ($taxonomias)
  <div class="taxonomias bloque" id="bloque-2">

     @if ($taxonomias['has_metaproyecto'])
        <div class="mb-3 bloque metaproyectos">
          {!! count($taxonomias['metaproyecto']) > 1 ? '<h3 class="font-bold">Metaproyectos:</h3>' : '<h3 class="font-bold">Metaproyecto:</h3>'!!}
          <ul>
            @foreach ($taxonomias['metaproyecto'] as $metaproyecto)
              @if (is_front_page())
              <li>{{ $metaproyecto['term']->name }}</li>
              @else
                <li><a href="{{ $metaproyecto['link'] }}" class="">{{ $metaproyecto['term']->name }}</a> </li>
              @endif
            @endforeach
          </ul>
        </div>
     @endif

     @if ($taxonomias['has_tipo_de_proyecto'])
      <div class="mb-3 tipo-de-proyecto">
          {!! count($taxonomias['tipo_de_proyecto']) > 1 ? '<h3 class="font-bold">Tipos de proyecto:</h3>' : '<h3 class="font-bold">Tipo de proyecto:</h3>'!!}
          <ul>
            @foreach ($taxonomias['tipo_de_proyecto'] as $tipo_de_proyecto)
              @if (is_front_page())
              <li>{{ $tipo_de_proyecto['term']->name }}</li>
              @else
                <li><a href="{{ $tipo_de_proyecto['link'] }}" class="">{{ $tipo_de_proyecto['term']->name }}</a> </li>
              @endif
            @endforeach
          </ul>
      </div>
     @endif

     @if ($taxonomias['has_lineas'])
      <div class="mb-3 bloque lineas-investigacion">
          {!! count($taxonomias['lineas']) > 1 ? '<h3 class="font-bold">Líneas de investigación:</h3>' : '<h3 class="font-bold">Línea de investigación:</h3>'!!}
          <ul>
            @foreach ($taxonomias['lineas'] as $linea)
              @if (is_front_page())
              <li>{{ $linea['term']->name }}</li>
              @else
                <li><a href="{{ $linea['link'] }}" class="">{{ $linea['term']->name }}</a> </li>
              @endif
            @endforeach
          </ul>
      </div>
     @endif

     @if ($taxonomias['has_tipo_de_actividad'])
      <div class="mb-3 bloque tipo-actividad">
          {!! count($taxonomias['tipo_de_actividad']) > 1 ? '<h3 class="font-bold">Tipos de actividad:</h3>' : '<h3 class="font-bold">Tipo de actividad:</h3>'!!}
          <ul>
            @foreach ($taxonomias['tipo_de_actividad'] as $tipo_de_actividad)
                <li>{{ $tipo_de_actividad['term']->name }}</li>
            @endforeach
          </ul>
      </div>
     @endif

  </div>
@endif

@if (is_single())
@hasfields('documentos_asociados')
<div class="documentos-asociados bloque" id="bloque-3">
  <h3 class="mb-3 font-bold">Documentos asociados</h3>
  <ul>
    @fields('documentos_asociados')
    @php
        $doc = get_sub_field('documento_asociado')
    @endphp
    <li class="flex pb-3 mb-3">
      <div class="flex-grow-0 flex-shrink-0 mr-4 icono">
        @switch(true)
          @case(str_contains($doc['subtype'], 'pdf'))
            <i class="fas fa-file-pdf"></i>
            @break
          @case(str_contains($doc['subtype'], 'zip'))
            <i class="fas fa-file-archive"></i>
            @break
          @case(str_contains($doc['subtype'], 'rtf'))
            <i class="fas fa-file-alt"></i>
            @break
          @case(preg_match('/(word)/', $doc['subtype']))
            <i class="fas fa-file-word"></i>
            @break
          @case(preg_match('/(sheet)||(presentationml)/', $doc['subtype']))
            <i class="fas fa-file-excel"></i>
            @break
          @case(preg_match('/(powerpoint)||(excel)/', $doc['subtype']))
            <i class="fas fa-file-powerpoint"></i>
            @break
          @default
          <i class="fas fa-file"></i>
        @endswitch
      </div>
      <div class="pt-1 wrap">
        <div class="enlace">
          <a href="{{ $doc['url'] }}" class="" download>{{ $doc['title'] }}</a>
        </div>
        <div class="descripcion">
          {{ $doc['caption'] }}
        </div>
      </div>
    </li>
  @endfields
  </ul>
</div>

@endhasfields
    
@endif