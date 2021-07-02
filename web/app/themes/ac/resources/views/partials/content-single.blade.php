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

  @if (have_rows('usuarios'))
  @php
      $usuarios_post = [];
  @endphp
    @while (have_rows('usuarios'))
      @php
          the_row();
          $usuario_post = get_sub_field('nombre_usuario');
          $nombre_post = $usuario_post['display_name'];
          $rol_post = get_sub_field('rol_usuarios');
          array_push($usuarios_post, [
            'user' => $usuario_post,
            'display_name' => $nombre_post,
            'rol' => $rol_post,
          ]);
      @endphp
    @endwhile
  @endif

  @foreach ($terms as $term)
    @php
      $usuarios_term = [];
    @endphp
  
    @while (have_rows('usuarios', 'term_' . $term->term_id))
      @php
          the_row();
          $nombre_term = get_sub_field('nombre_usuario', $term->term_id);
          array_push($usuarios_term, $nombre_term['display_name']);
      @endphp
    @endwhile
  @endforeach

  @dump($usuarios_post)
  @dump($usuarios_term)

  @foreach ($usuarios_post as $usuario_post)
    @if (! in_array($usuario_post['display_name'], $usuarios_term))
      <p>{{ $usuario_post['display_name'] . ': no' }}</p> 
    @else
      <p>{{ $usuario_post['display_name'] . ': si' }}</p> 
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
