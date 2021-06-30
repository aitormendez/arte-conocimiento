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
 * Cambiar títulos sentencias
 */


    // add_action( 'acf/save_post', function ($post_id) {
    // $post_type = get_post_type($post_id);

    // if ($post_type == 'proyecto') {

    //     $usuarios = [];

    //     if( have_rows('participantes') ):
    //         while( have_rows('participantes') ) : the_row();
    //             var_dump(get_sub_field('participante'));
    //         endwhile;
    //     endif;

    // }
    // });