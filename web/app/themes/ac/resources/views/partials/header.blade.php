<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    {{ $siteName }}
  </a>

  <nav class="solapa">
    @include('partials.navigation')
    <button id="hamb">
      @svg('images.hamb', 'fixed top-5 right-5')
    </button>
  </nav>
</header>
