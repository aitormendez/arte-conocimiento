<header class="banner">
  <a class="brand" href="{{ home_url('/') }}">
    <span class="block">Prácticas Artísticas</span>
    <span class="block">y Formas de Conocimiento</span>
    <span class="block">Contemporáneas</span>
  </a>

  <nav class="solapa fixed top-0 bg-white p-4">
    @include('partials.navigation')
  </nav>

  <button id="hamb" class="fixed flex flex-col justify-between top-4 right-4">
    <b class="h block bg-black w-full"></b>
    <b class="h block bg-black w-full"></b>
    <b class="h block bg-black w-full"></b>
  </button>
</header>
