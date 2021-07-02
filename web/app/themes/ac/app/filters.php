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
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

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

        // PARTICIPANTES

        // crear array de participantes que están en el post

        $participantes_post = [];
        if( have_rows('participantes') ):
            while( have_rows('participantes') ) : the_row();
                $nombre = get_sub_field('nombre_participante');
                array_push($participantes_post, $nombre);
            endwhile;
        endif;

        // comprobar terms que están en este post

        $terms = get_the_terms( $post_id, 'metaproyecto' );

        // crear array de participantes que están en cada term de este post
        
        foreach ($terms as $term) {
            $participantes_term = [];

            while( have_rows('participantes', 'term_' . $term->term_id) ) : the_row();
                $nombre_term = get_sub_field('nombre_participante', $term->term_id);
                array_push($participantes_term, $nombre_term);
            endwhile;
        }

    }
    });