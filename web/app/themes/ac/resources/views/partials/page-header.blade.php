<div class="px-4 pb-20 prose lg:px-0 page-header lg:mx-auto lg:max-w-3xl">
  
  <h1>{!! $title !!}</h1>


  @if (is_archive())
    @isset($descripcion)
      @if ($descripcion)
        <div class="descripcion color-ya">
          <div class="relative p-4 text-sm caja">
            {!! $descripcion !!}
          </div>
        </div>
      @endif
    @endisset
  @endif
</div>