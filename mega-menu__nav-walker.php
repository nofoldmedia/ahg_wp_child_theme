<?php
/**
 * 
 * :: Nav walker for Wordpress wp_nav_menu()
 * Basic Nav walker
 * 
 */

class Custom_Nav_Walker extends Walker_Nav_Menu {
    private $column_open = false;

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent    = str_repeat("\t", $depth);
        $child_key = 'sub-menu_lvl__' . ($depth + 1);
        $output   .= "\n$indent<ul class=\"$child_key\">\n";
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent  = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent  = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = 'menu-item-' . $item->ID;
        if ($depth === 0) {
            $classes[] = 'top_lvl_item';
        }

        // Column break
        if ( get_field('f__break_menu_column', $item->ID) ) {
            $classes[] = 'break-column';
        }

        // Modal toggle + extract modal ID robustly
        $acf_modal   = (bool) get_field('f__make_menu_item_open_modal', $item->ID);
        $modal_field = $acf_modal ? get_field('f__select_modal', $item->ID) : null;

        $modal_id = 0;
        if ($modal_field) {
            if (is_object($modal_field) && isset($modal_field->ID)) {
                $modal_id = (int) $modal_field->ID;                // ACF “Post Object”
            } elseif (is_array($modal_field) && isset($modal_field['ID'])) {
                $modal_id = (int) $modal_field['ID'];             // ACF “Array”
            } else {
                $modal_id = (int) $modal_field;                   // Already an ID
            }
        }
        if ($acf_modal && $modal_id) {
            $classes[] = 'has-modal-link'; // (optional) helper on <li>
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

        $output .= $indent . '<li' . $id_attr . $class_names . '>';

        // Build link attributes
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '';

        // If modal enabled add class + data attribute to <a>
        if ($acf_modal && $modal_id) {
            $atts['class'] = trim( ($atts['class'] ?? '') . ' t-p-acf-t2-ct-button-group__button-modal' );
            $atts['data-modal-link-post-id'] = (string) $modal_id;
            $atts['role'] = 'button';
            $atts['aria-haspopup'] = 'dialog';
        }

        // Allow other filters to adjust attributes
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        // Compile attributes
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if ($value === '' || $value === null) continue;
            $value = ($attr === 'href') ? esc_url($value) : esc_attr($value);
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

        if (!isset($this->item_counts[$depth])) {
            $this->item_counts[$depth] = 0;
        }
        $this->item_counts[$depth]++;
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}

?>