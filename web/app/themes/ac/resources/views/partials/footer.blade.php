<footer class="flex flex-col px-4 py-12 mt-24 bg-gray-300 md:flex-row md:justify-between content-info">

<div class="mb-6 text-center buscar">
  {!! get_search_form(false) !!}
</div>

  <div class="bloque md:flex md:items-end">
    <div class="flex flex-col items-center text-center logos md:mx-6 md:order-2">
      <div class="mb-10 logo-ucm">
        <img src="/app/themes/ac/public/images/ucm.png" alt="logotipo universidad complutense de madrid" loading="lazy">
      </div>
    
      <div class="mb-10 logo-bellasartes md:mb-0">
        <img src="/app/themes/ac/public/images/bellasartes.png" alt="logotipo facultad de bellas artes universidad complutense de madrid" loading="lazy">
      </div>
    </div>

    <div class="prose text-gray-700 texto">{!! get_field('footer', 'option') !!}</div>
  </div>

</footer>
