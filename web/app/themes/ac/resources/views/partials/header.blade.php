<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    <span class="block">Prácticas Artísticas</span>
    <span class="block">y Formas de Conocimiento</span>
    <span class="block">Contemporáneas</span>
  </a>

  <nav class="solapa absolute">
    @include('partials.navigation')
    <button id="hamb">
      @svg('images.hamb', 'fixed top-5 right-5')
    </button>
  </nav>
</header>
