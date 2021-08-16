<a role="article" href="{{ get_permalink() }}" class="block p-4 mb-4 bg-white normal infinite-scroll-item">
  <div class="wrap lg:mx-auto lg:max-w-3xl">
    @if (has_post_thumbnail())
      <div class="pb-4 thumb">
        @thumbnail('full')
      </div>
    @endif

    <header>
      <p class="inline-block px-2 py-1 mb-2 btn">{{ get_post_type() }}</p>
      <h2 class="mb-3 text-xl font-bold entry-title">
        {!! $title !!}
      </h2>
      <div class="mb-3 text-xs text-gray-500 meta">
        @include('partials/entry-meta')
      </div>
    </header>
    <div class="prose text-black entry-summary">
      @php(the_excerpt())
    </div>
  </div>
</a>
