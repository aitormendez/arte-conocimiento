<article @php post_class() @endphp >
  <header>
    <h1 class="entry-title">
      {!! $title !!}
    </h1>

    @include('partials/entry-meta')
  </header>

  @php
      $terms = get_the_terms( $post->ID, 'metaproyecto' )
  @endphp

  @dump($terms)

  @if (have_rows('participantes'))
  @php
      $participantes_post = [];
  @endphp
    @while (have_rows('participantes'))
      @php
          the_row();
          $nombre_post = get_sub_field('nombre_participante');
          array_push($participantes_post, $nombre_post);
      @endphp
    @endwhile
  @endif

  @foreach ($terms as $term)
    @php
      $participantes_term = [];
    @endphp
  
    @while (have_rows('participantes', 'term_' . $term->term_id))
      @php
          the_row();
          $nombre_term = get_sub_field('nombre_participante', $term->term_id);
          array_push($participantes_term, $nombre_term);
      @endphp
    @endwhile
  @endforeach

  @dump($participantes_post)
  @dump($participantes_term)

  @foreach ($participantes_post as $participante_post)
    @if (! in_array($participante_post, $participantes_term))
      <p>{{ $participante_post . 'no' }}</p> 
    @else
      <p>{{ $participante_post . 'si' }}</p> 
    @endif
  @endforeach



  <div class="entry-content">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>

  @php(comments_template())
</article>
