<?php  

function sidebar_init()
{
    register_sidebar(array(
        'name' => 'Left sidebar Shops',
        'id' => 'left-sidebar',
        'description' => 'Left sidebar for Shops',
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'sidebar_init'); 