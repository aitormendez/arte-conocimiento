<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
// add_filter('excerpt_more', function () {
//     return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
// });

/**
 * Añadir CPTs al archivo de categoría.
 *
 */
add_action(
    'pre_get_posts',
    function($query) {
        if (
            is_admin() ||
            ! $query->is_main_query() ||
            ! is_category()
        ) {
            return;
        }
        $query->set( 'post_type', array( 'post', 'book' ) );
    }
);

/**
 * Añadir usuarios de posts a usuarios de taxonomía
 */


add_action( 'acf/save_post', function ($post_id) {
$post_type = get_post_type($post_id);

    if ($post_type == 'proyecto') {

        // PARTICIPANTES y USUARIOS
        // --------------------------------------------------------------------------

        // crear array de PARTICIPANTES que están en el post

        $participantes_post = [];
        if( have_rows('participantes') ):
            while( have_rows('participantes') ) : the_row();
                $nombre_post = get_sub_field('nombre_participante');
                $rol_post = get_sub_field('rol_participante');
                array_push($participantes_post, [
                    'nombre' => $nombre_post,
                    'rol' => $rol_post,
                ]);
            endwhile;
        endif;

        // crear array de USUARIOS que están en el post

        $usuarios_post = [];
        if( have_rows('usuarios') ):
            while( have_rows('usuarios') ) : the_row();
                $usuario_post = get_sub_field('nombre_usuario');
                $nombre_post = $usuario_post['display_name'];
                $rol_post = get_sub_field('rol_usuario');
                array_push($usuarios_post, [
                    'user' => $usuario_post,
                    'display_name' => $nombre_post,
                    'rol' => $rol_post,
                ]);
            endwhile;
        endif;

        // comprobar terms que están en este post

        $terms = get_the_terms( $post_id, 'proyecto' );

        
        
        foreach ($terms as $term) {

            // crear array de PARTICIPANTES que están en cada term de este post
            $participantes_term = [];

            while( have_rows('participantes', 'term_' . $term->term_id) ) : the_row();
                $nombre_term = get_sub_field('nombre_participante', $term->term_id);
                array_push($participantes_term, $nombre_term);
            endwhile;

            // comprobar que cada participante del $participantes_post 
            // no está en $participantes_term y añadirlo

            foreach ($participantes_post as $participante_post) {
                if (! in_array($participante_post['nombre'], $participantes_term)) {
                    $row = array(
                        'nombre_participante' => $participante_post['nombre'],
                        'rol_participante' => $participante_post['rol'],
                    );
                    add_row('participantes', $row, 'term_' . $term->term_id);
                }
            }




            // crear array de USUARIOS que están en cada term de este post
            $usuarios_term = [];

            while( have_rows('usuarios', 'term_' . $term->term_id) ) : the_row();
                $nombre_term = get_sub_field('nombre_usuario', $term->term_id);
                array_push($usuarios_term, $nombre_term['display_name']);
            endwhile;

            // comprobar que cada USUARIO del $usuarios_post 
            // no está en $usuarios_term y añadirlo

            foreach ($usuarios_post as $usuario_post) {
                if (! in_array($usuario_post['display_name'], $usuarios_term)) {
                    $row = array(
                        'nombre_usuario' => $usuario_post['user'],
                        'rol_usuario' => $usuario_post['rol'],
                    );
                    add_row('usuarios', $row, 'term_' . $term->term_id);
                }
            }




        }

    }
});


/**
 * Añadir CPTs a main query en authors
 */

add_action('pre_get_posts', function ($query) {
    if (! is_admin() && is_author() && $query->is_main_query() ) {
        $query->set('post_type', [
            'noticia', 
            'publicacion',
            'actividad',
            'transferencia',
        ]);
    }
    return $query;
});

/**
 * Añadir CPT 'publicaciones' al archivo de CPT 'actividades'
 */

add_action('pre_get_posts', function ($query) {
    if (! is_admin() && is_post_type_archive('actividad') && $query->is_main_query() ) {
        $query->set('post_type', [
            'publicacion',
            'actividad',
        ]);
    }
    return $query;
});



/**
 * Añadir CPTs a la página de autor
 */

add_action('pre_get_posts', function ($query) {
    if (! is_admin() && is_author() && $query->is_main_query() ) {
        $query->set('post_type', [
            'publicacion',
            'actividad',
            'investigacion',
            'transferencia',
        ]);
    }
    return $query;
});


/*
 * Cambiar títulos
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    $q = get_queried_object();
    if (is_post_type_archive('investigacion')) {
        $title = 'Fomento de la investigación';
    } elseif (is_tax()) {
        $title = $q->name;
    } elseif (is_author()) {
        $title = $q->data->display_name;
    } else {
        $title = $q->labels->name;
    }
    return $title;
});

/*
 *  Ocultar menú ACF
 */
add_filter('acf/settings/show_admin', '__return_false');





/*
 *  para query en repeter field author template
 */

// add_filter('posts_where', function( $where ) {
	
// 	$where = str_replace("meta_key = 'usuarios_$", "meta_key LIKE 'usuarios_%", $where);

// 	return $where;
// }
// );
