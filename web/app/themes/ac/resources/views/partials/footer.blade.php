<footer class="flex flex-col items-center px-4 py-12 mt-24 bg-gray-300 content-info">
  @php(dynamic_sidebar('sidebar-footer'))

  <div class="mb-10 logo-ucm">
    <img src="/app/themes/ac/public/images/ucm.png" alt="logotipo universidad complutense de madrid" loading="lazy">
  </div>
  
  <div class="mb-10 logo-bellasartes">
    <img src="/app/themes/ac/public/images/bellasartes.png" alt="logotipo facultad de bellas artes universidad complutense de madrid" loading="lazy">
  </div>

  <div class="prose text-center texto">{!! get_field('footer', 'option') !!}</div>
</footer>
