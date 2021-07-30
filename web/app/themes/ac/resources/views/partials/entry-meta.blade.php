<time class="updated" datetime="{{ get_post_time('c', true) }}">
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

@if ($taxonomias)
  <div class="taxonomias">

     @if ($taxonomias['has_metaproyecto'])
        <div class="mb-3 bloque metaproyectos">
          {!! count($taxonomias['metaproyecto']) > 1 ? '<h3 class="font-bold">Metaproyectos:</h3>' : '<h3 class="font-bold">Metaproyecto:</h3>'!!}
          <ul>
            @foreach ($taxonomias['metaproyecto'] as $metaproyecto)
                <li>{{ $metaproyecto['term']->name }}</li>
            @endforeach
          </ul>
        </div>
     @endif

     @if ($taxonomias['has_tipo_de_proyecto'])
      <div class="mb-3 bloque tipo-de-proyecto">
          {!! count($taxonomias['tipo_de_proyecto']) > 1 ? '<h3 class="font-bold">Tipos de proyecto:</h3>' : '<h3 class="font-bold">Tipo de proyecto:</h3>'!!}
          <ul>
            @foreach ($taxonomias['tipo_de_proyecto'] as $tipo_de_proyecto)
                <li>{{ $tipo_de_proyecto['term']->name }}</li>
            @endforeach
          </ul>
      </div>
     @endif

     @if ($taxonomias['has_lineas'])
      <div class="mb-3 bloque lineas-investigacion">
          {!! count($taxonomias['lineas']) > 1 ? '<h3 class="font-bold">Líneas de investigación:</h3>' : '<h3 class="font-bold">Línea de investigación:</h3>'!!}
          <ul>
            @foreach ($taxonomias['lineas'] as $lineas)
                <li>{{ $lineas['term']->name }}</li>
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
<ul class="documentos-asociados">
  @fields('documentos_asociados')
  @php
      $doc = get_sub_field('documento_asociado')
  @endphp
  @dump($doc))
  <li>
    @switch($doc['mime_type'])
        @case('application/pdf')
            <i class="fas fa-file-pdf"></i>
            @break
        @case('application/zip')
            <i class="fas fa-file-alt"></i>
            @break
        @case('application/rtf')
            <i class="fas fa-file-alt"></i>
            @break
        @case('application/pdf')
            <i class="fas fa-file-archive"></i>
            @break
        @default
        <i class="fas fa-file"></i>
    @endswitch

    <a href="{{ $doc['url'] }}" download>{{ $doc['title'] }}</a>
  </li>
@endfields
</ul>

@endhasfields
    
@endif