<div class="px-4 pb-20 prose lg:px-0 page-header lg:mx-auto lg:max-w-3xl">
  <h1>{!! $title !!}</h1>
  @if (is_archive())
       {!! get_the_archive_description() !!}
  @endif
</div>