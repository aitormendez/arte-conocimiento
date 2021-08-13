<header class="top-0 items-start w-full px-4 pb-4 banner lg:flex lg:fixed md:z-50">
  <a class="inline-block mt-4 leading-tight text-black hover:text-blue brand md:mr-6" href="{{ home_url('/') }}">
    <span class="block">Prácticas Artísticas</span>
    <span class="block">y Formas de Conocimiento</span>
    <span class="block">Contemporáneas</span>
  </a>

  <nav class="fixed top-0 z-40 p-4 bg-white solapa">
    @include('partials.navigation-mobile')
  </nav>
  <nav class="">
    @include('partials.navigation-desktop')
  </nav>

  <button id="hamb" class="fixed z-50 flex flex-col justify-between top-4 right-4 lg:hidden">
    <b class="block w-full bg-black h"></b>
    <b class="block w-full bg-black h"></b>
    <b class="block w-full bg-black h"></b>
  </button>
</header>
