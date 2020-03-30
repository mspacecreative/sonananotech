<?php

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_style', 9999 );
function enqueue_child_theme_style() {
	wp_enqueue_style( 'dtbwp_css_child', get_stylesheet_directory_uri() . '/style.css', array(
		'dtbwp_style',
	), 1.0 );
}

// Load styles in header
function customStyles() {
	wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&display=swap', array(), '1.0', 'all');
	wp_enqueue_style('googlefont');
}

// Load scripts in footer
function footerScripts() {
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
}

// SONACAST
function sonaCastEpisodes() {
	ob_start();
		get_template_part('includes/sonacast');
	return ob_get_clean();
}

// ACTIONS, FILTERS, SHORTCODES
add_action('wp_enqueue_scripts', 'footerScripts', 20);
add_action('wp_enqueue_scripts', 'customStyles');
add_shortcode( 'sonacast_episodes', 'sonaCastEpisodes' );

