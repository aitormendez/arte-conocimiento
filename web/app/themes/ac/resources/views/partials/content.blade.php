<a role="article" href="{{ get_permalink() }}" class="block p-4 mb-4 bg-white normal infinite-scroll-item">
  <div class="wrap lg:mx-auto lg:max-w-3xl">
    @if (has_post_thumbnail())
      <div class="pb-4 thumb">
        @thumbnail('full')
      </div>
    @endif

    <header>
      <h2 class="mb-3 text-xl font-bold entry-title">
        {!! $title !!}
      </h2>
      <div class="text-xs text-gray-400 meta">
        @include('partials/entry-meta')
      </div>
    </header>
    <div class="text-black entry-summary">
      @php(the_excerpt())
    </div>
  </div>
</a>
