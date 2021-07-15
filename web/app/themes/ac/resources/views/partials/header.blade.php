<header class="p-4 banner">
  <a class="inline-block brand" href="{{ home_url('/') }}">
    <span class="block">Prácticas Artísticas</span>
    <span class="block">y Formas de Conocimiento</span>
    <span class="block">Contemporáneas</span>
  </a>

  <nav class="fixed top-0 z-40 p-4 bg-white solapa">
    @include('partials.navigation')
  </nav>

  <button id="hamb" class="fixed z-50 flex flex-col justify-between top-4 right-4 lg:hidden">
    <b class="block w-full bg-black h"></b>
    <b class="block w-full bg-black h"></b>
    <b class="block w-full bg-black h"></b>
  </button>
</header>
