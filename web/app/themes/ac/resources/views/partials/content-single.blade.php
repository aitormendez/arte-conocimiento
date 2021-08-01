<article @php post_class('px-4 lg:px-0') @endphp >

  <header>
    <div class="prose lg:mx-auto lg:max-w-3xl">    
      <h1 class="entry-title">{!! $title !!}</h1>
  </div>


    <div class="my-8 overflow-hidden bg-white">
      <div class="flex items-center cursor-pointer info lg:mx-auto lg:max-w-3xl">
        info <span class="mx-3 fas fa-angle-right fa-2x"></span>
      </div>
      <div class="meta">
        <div class="p-4 wrap">
          @include('partials/entry-meta')
        </div>
      </div>
    </div>

  </header>

  <div class="prose entry-content lg:mx-auto lg:max-w-3xl">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
