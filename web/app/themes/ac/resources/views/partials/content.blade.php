<article @php(post_class('mb-4 p-4 bg-white infinite-scroll-item'))>
  <div class="wrap lg:mx-auto lg:max-w-3xl">
    @if (has_post_thumbnail())
      <div class="pb-4 thumb">
        @thumbnail('full')
      </div>
    @endif

    <header>
      <h2 class="mb-3 text-xl font-bold entry-title">
        <a href="{{ get_permalink() }}">
          {!! $title !!}
        </a>
      </h2>
      <div class="text-xs text-gray-400 meta">
        @include('partials/entry-meta')
      </div>
    </header>
    <div class="entry-summary">
      @php(the_excerpt())
    </div>
  </div>
</article>
