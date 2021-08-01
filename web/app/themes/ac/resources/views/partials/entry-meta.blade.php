<div class="lg:w-1/5 xl:w-1/3 bloque lg:mr-10 xl:flex" id="bloque-1">
  <time class="block mb-3 updated xl:mr-10 xl:w-32" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }}
  </time>
  
  @if (is_front_page())
    @php
      $personas = $personas_front_page($destacado['ID']);
      $taxonomias = $taxonomias_front_page($destacado['ID'])
    @endphp
  @endif
  
  @if ($personas)
    <div class="mb-3 personas">
      @foreach ($personas as $persona)
        @if ($persona['tipo'] === 'usuario')
  
          <p class="my-0 byline author vcard">
            @if (! is_home())
              <a href="{{ $persona['permalink'] }}" class="" rel="author"><span class="fn">{{ $persona['nombre'] }}</span></a><span class="text-gray-400 role"> | {{ $persona['rol']['label'] }}</span>
            @else
              {{ $persona['nombre'] }}</span> | <span class="text-gray-400 role">{{ $persona['rol']['label'] }}</span>
            @endif
  
          </p>
  
        @elseif ($persona['tipo'] === 'participante')
  
        <p class="byline author vcard">
          <span rel="author" class="fn">{{ $persona['nombre'] }}</span>@if ($persona['rol']['value'] != 'sin_rol')<span class="text-gray-400 role"> | {{ $persona['rol']['label'] }}</span>@endif
        @endif
      @endforeach
    </div>
  @endif
</div>

@if ($taxonomias)
  <div class="lg:w-1/5 taxonomias bloque lg:mr-10 xl:w-1/3" id="bloque-2">

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
<div class="documentos-asociados bloque lg:w-3/5" id="bloque-3">
  <h3 class="mb-3 font-bold">Documentos asociados</h3>
  <ul>
    @fields('documentos_asociados')
    @php
        $doc = get_sub_field('documento_asociado')
    @endphp
    <li class="flex mb-3">
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
      <div class="pt-2 wrap">
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