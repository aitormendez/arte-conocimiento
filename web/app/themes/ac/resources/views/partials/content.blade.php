<article @php(post_class('mb-4 p-4 bg-white'))>
  <div class="wrap lg:mx-auto lg:max-w-3xl">
    <header>
      <h2 class="mb-3 text-xl font-bold entry-title">
        <a href="{{ get_permalink() }}">
          {!! $title !!}
        </a>
      </h2>
      <div class="text-xs meta">
        @include('partials/entry-meta')
      </div>
    </header>
    <div class="entry-summary">
      @php(the_excerpt())
    </div>
  </div>
</article>
