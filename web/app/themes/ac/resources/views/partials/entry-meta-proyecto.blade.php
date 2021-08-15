<div class="w-full px-4 md:flex meta">
    @if ($personas_proyecto['web'] || $personas_proyecto['fecha_inicio'] )

        <div class="md:border-r md:border-black bloque-1 md:mr-3 md:pr-3">

            @if ($personas_proyecto['fecha_inicio'])
                <p>Fecha inicio: {{ $personas_proyecto['fecha_inicio'] }}</p>
            @endif

            @if ($personas_proyecto['fecha_fin'])
                <p>Fecha final: {{ $personas_proyecto['fecha_fin'] }}</p>
            @endif


            @if ($personas_proyecto['web'])
                <a href="{{ $personas_proyecto['web']['url'] }}" target="{{ $personas_proyecto['web']['target'] }}">{{ $personas_proyecto['web']['title'] }}</a>
            @endif


        </div>
        
    @endif
    @if ($personas_proyecto['usuarios'])
        <div class="bloque-2">
            <ul>
                @foreach ($personas_proyecto['usuarios'] as $persona)
                    <li class="mb-3">
                        <a href="{{ $persona['permalink'] }}" class="" rel="author">
                            <span class="fn">{{ $persona['nombre'] }}</span>
                        </a>
                        <i class="block rol">{{ $persona['rol']['label'] }}</i>
                    </li>
                @endforeach
                @foreach ($personas_proyecto['participantes'] as $persona)
                    <li class="mb-3">
                        {{ $persona['nombre'] }}</span><i class="block rol"">{{ $persona['rol']['label'] }}</i>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
