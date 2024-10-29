<?php

class AD_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth=0, $args=[], $id=0)
    {
	if( $item->classes === '' ) {
		$item->classes = [];
	}

        if ($args->walker->has_children) {
            $output .= "<li class='nav-item nav-item-wrap" .  implode(" ", $item->classes) . "'>";
        } else {
            $output .= "<li class='nav-item" .  implode(" ", $item->classes) . "'>";
        }

        if ($item->url && $item->url != '#') {
            $output .= '<a class="nav-link" href="' . $item->url . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $item->title;

        if ($item->url && $item->url != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
        if ($args->walker->has_children) {
            $output .= '<i class="margin-left-5 caret fa fa-angle-down"></i>';
        }
    }
        // add classes to ul sub-menus
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
            // depth dependent classes
            $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
            $display_depth = ( $depth + 1); // because it counts the first submenu as 0
            $classes = array(
                'sub-menu',
                'menu-depth-' . $display_depth
            );
            $class_names = implode( ' ', $classes );
    
            // build html
            if ($display_depth == 1) {
                $output .= "\n" . $indent . '<ul class="sub-items ' . $class_names . '">' . "\n";
            } else {
                $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
            }
        }
}
