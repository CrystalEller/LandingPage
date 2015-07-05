<?php

class Social_Walker extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;
        $social_label='<i class="';

        foreach ($classes as $key=>$class) {
            if(preg_match('#(^fa$|^fa-.+)#',$class)){
                $social_label.=$class.' ';
                unset($classes[$key]);
            }
        }

        $social_label.='"></i>';

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';


        $output .=
             "<a $attributes>"
            . $social_label
            . '</a> ';
    }
}