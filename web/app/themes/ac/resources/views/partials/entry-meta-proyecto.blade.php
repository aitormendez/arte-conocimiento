<div class="w-full px-4 md:flex">
    @if ($personas_proyecto['web'])
    <div class="text-sm md:border-r md:border-black bloque-1 md:mr-3 md:pr-3">
        <a href="{{ $personas_proyecto['web']['url'] }}" target="{{ $personas_proyecto['web']['target'] }}">{{ $personas_proyecto['web']['title'] }}</a>
    </div>
        
    @endif
    @if ($personas_proyecto['usuarios'])
        <div class="bloque-2">
            <ul>
                @foreach ($personas_proyecto['usuarios'] as $persona)
                    <li class="mb-3 text-sm">
                        <a href="{{ $persona['permalink'] }}" class="" rel="author">
                            <span class="fn">{{ $persona['nombre'] }}</span>
                        </a>
                        <i class="block rol">{{ $persona['rol']['label'] }}</i>
                    </li>
                @endforeach
                @foreach ($personas_proyecto['participantes'] as $persona)
                    <li class="mb-3 text-sm">
                        {{ $persona['nombre'] }}</span><i class="block rol"">{{ $persona['rol']['label'] }}</i>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
