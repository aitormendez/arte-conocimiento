<div class="pb-20 page-header">

  <div class="px-4 mb-6 prose lg:px-0 lg:mx-auto lg:max-w-3xl">
    <h1>{!! $title !!}</h1>
  </div>
  

  @if (is_tax('proyecto'))
    <div class="mb-10 overflow-hidden bg-white">
      <div class="flex items-center pl-4 cursor-pointer lg:px-0 info lg:mx-auto lg:max-w-3xl">
        info <span class="mx-3 fas fa-angle-right fa-2x"></span>
      </div>
      <div class="meta">
        <div class="px-4 pt-4 leading-tight lg:px-0 wrap md:flex md:justify-start">
          @include('partials/entry-meta-proyecto')
        </div>
      </div>
    </div>
  @endif


  @if (is_archive())
    @isset($descripcion)
      @if ($descripcion)
        <div class="px-4 prose descripcion color-ya lg:px-0 lg:mx-auto lg:max-w-3xl">
          <div class="relative p-4 text-sm caja ">
            {!! $descripcion !!}
          </div>
        </div>
      @endif
    @endisset
  @endif
</div>