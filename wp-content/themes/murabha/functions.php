<?php
require_once('bs4navwalker.php');

if ( ! function_exists( 'osmot_setup' ) ) :
	function osmot_setup() {

		load_theme_textdomain( 'osmot', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		function custom_menu() {
			register_nav_menus(array(
				'bootstrap-menu' => 'Navigation Bar'
				// 'footer-menu' => 'Footer Bar'

			));
		}
		
		// Bootstrap Menu
		function bootstrap_nav_menu() {
			wp_nav_menu(array(
				'menu'            => 'bootstrap-menu',
				'theme_location'  => 'bootstrap-menu',
				'container'       => false,
				'container_class' => 'collapse navbar-collapse',
				'menu_id'         => false,
				'menu_class'      => 'nav navbar-nav',
				'depth'           => 2,
				'fallback_cb'     => 'bs4navwalker::fallback',
				'walker'          => new bs4navwalker()
			));
		}

		function add_menuclass($ulclass) {
			return preg_replace('/<a /', '<a class=""', $ulclass);
		 }
		 add_filter('wp_nav_menu','add_menuclass');

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'osmot_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;

function osmot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'osmot_content_width', 640 );
}

function osmot_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'osmot' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'osmot' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function osmot_scripts() {
	// wp_enqueue_style( 'osmot-style', get_stylesheet_uri() );

	// if (qtranxf_getLanguage() == 'ar') {
	// 	echo '<link rel="stylesheet" type="text/css" href="/css/bootstrap-rtl.css"/>';}

	// Bootstrap
	wp_enqueue_style( 'osmot-bs', get_template_directory_uri() . '/css/bootstrap-v4.min.css' );
	wp_enqueue_style( 'osmot-bstwo', get_template_directory_uri() . '/css/bootstrap-v4-rtl.min.css' );
	// Fontawesome
	// wp_enqueue_style( 'osmot-fa', get_template_directory_uri() . '/css/fontawesome-all.css' );
	// Swiper
	wp_enqueue_style( 'osmot-swiper', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'osmot-swiper-min', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
	// Coco Font
	wp_enqueue_style( 'coco-font', get_template_directory_uri() . '/fonts/bein/stylesheet.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/fonts/flaticon/font/flaticon.css' );
	// Hover CSS
	wp_enqueue_style( 'osmot-hover', get_template_directory_uri() . '/css/hover-min.css' );
	// Animate
	wp_enqueue_style( 'osmot-animate', get_template_directory_uri() . '/css/animate.min.css' );
	// AOS
	wp_enqueue_style( 'osmot-responsive', get_template_directory_uri() . '/css/aos.min.css' );
	// Style Files
	wp_enqueue_style( 'osmot-style', get_template_directory_uri() . '/css/style.css' );

	// Script Files
	wp_deregister_script('jquery');
	wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, '', true);
	wp_enqueue_script('jquery');

	// wp_enqueue_script( 'osmot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '01', true );
	// wp_enqueue_script( 'osmot-custom', get_template_directory_uri() . '/js/customizer.js', array(), '01', true );
	wp_enqueue_script( 'osmot-swiper-js', get_template_directory_uri() . '/js/popper.js', array(), '01', true );
	wp_enqueue_script( 'osmot-bootstrap-js', get_template_directory_uri() . '/js/bootstrap-v4.min.js', array('jquery'), '01', true );
	wp_enqueue_script( 'osmot-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'osmot-custom', get_template_directory_uri() . '/js/aos.min.js', array(), '01', true );
	wp_enqueue_script( 'osmot-main', get_template_directory_uri() . '/js/main.js', array(), false, true );

	wp_enqueue_script( 'osmot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

//redux
if (!isset($content_width))
    $content_width = 740;
// Run Redux framework
if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/admin/ReduxCore/framework.php')) {
    require_once(dirname(__FILE__) . '/admin/ReduxCore/framework.php');
}

// load the theme's options
if (!isset($redux_owd) && file_exists(dirname(__FILE__) . '/admin/sample/sample-config.php')) {
    require_once(dirname(__FILE__) . '/admin/sample/sample-config.php');
}
add_theme_support('automatic-feed-links');

global $murabha;
include 'includes/redux_based_options.php';

//End redux

add_action('init', 'custom_menu');
add_action( 'after_setup_theme', 'osmot_setup' );
add_action( 'widgets_init', 'osmot_widgets_init' );
add_action( 'after_setup_theme', 'osmot_content_width', 0 );
add_action( 'wp_enqueue_scripts', 'osmot_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_action('admin_enqueue_scripts', 'custom_scripts');
if (file_exists(__DIR__ . '/metabox/cmb2/init.php')) {
    require_once __DIR__ . '/metabox/cmb2/init.php';
} elseif (file_exists(__DIR__ . '/metabox/CMB2/init.php')) {
    require_once __DIR__ . '/metabox/CMB2/init.php';
}


include 'postType/slider.php';
include 'postType/aboutinfo.php';
include 'postType/foruslider.php';
include 'postType/successslider.php';
include 'postType/consult.php';
include 'metabox/slider.php';
include 'metabox/homepageMetaBox.php';
// include 'metabox/aboutMeta.php';