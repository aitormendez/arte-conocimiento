<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Archivo extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        return [
            'descripcion' => $this->descripcion(),
            'personas_proyecto' => $this->usuarios_proyecto(),
        ];
    }

    /**
     * Returns the achive description.
     *
     * @return string
     */
    public function descripcion()
    {
        $desc = get_the_archive_description();

        return  $desc ? $desc : false;
    }

    /**
     * Usuarios del term (taxonomía paroyecto).
     *
     * @return string
     */
    public function usuarios_proyecto()
    {
        if (is_tax('proyecto')) {
            
            $q = get_queried_object(); 

            $usuarios_proy = [];
            if( have_rows('usuarios', 'term_' . $q->term_id) ):
                while( have_rows('usuarios', 'term_' . $q->term_id) ) : the_row();
                    $usuario_proy = get_sub_field('nombre_usuario');
                    $nombre_proy = $usuario_proy['display_name'];
                    $rol_proy = get_sub_field('rol_usuario');
                    array_push($usuarios_proy, [
                        'tipo' => 'usuario',
                        'user' => $usuario_proy,
                        'nombre' => $nombre_proy,
                        'rol' => $rol_proy,
                        'permalink' => get_author_posts_url($usuario_proy['ID']),
                        ]);
                endwhile;
            endif;

            $participantes_proy = [];
            if( have_rows('participantes', 'term_' . $q->term_id) ):
                while( have_rows('participantes', 'term_' . $q->term_id) ) : the_row();
                    $nombre_post = get_sub_field('nombre_participante');
                    $rol_post = get_sub_field('rol_participante');
                    array_push($participantes_proy, [
                        'tipo' => 'participante',
                        'nombre' => $nombre_post,
                        'rol' => $rol_post,
                        ]);
                endwhile;
            endif;

            $output = [
                'usuarios' => $usuarios_proy,
                'participantes' => $participantes_proy,
                'web' => get_field('proyecto_web', 'term_' . $q->term_id)
            ];
        }


 



        

        return  isset($output) ? $output : false;
    }


}
