<?php
/**
 * Psychics functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Psychics
 */

if ( ! function_exists( 'psychics_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function psychics_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Psychics, use a find and replace
	 * to change 'psychics' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'psychics', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'psychics' ),
		'menu-2' => esc_html__( 'Footer Menu', 'psychics' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'psychics_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'psychics_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function psychics_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'psychics_content_width', 640 );
}
add_action( 'after_setup_theme', 'psychics_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function psychics_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'psychics' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'psychics' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'psychics_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function psychics_scripts() {

    wp_enqueue_style( 'psychics-style', get_stylesheet_uri() );
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

    wp_enqueue_style( 'halant-font', 'https://fonts.googleapis.com/css?family=Halant:400,500' );
    wp_enqueue_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:400,700' );

	wp_enqueue_style( 'custom-style', get_template_directory_uri(). '/css/style.css' );

	wp_enqueue_script( 'psychics-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );
    wp_enqueue_script( 'jquery-js',  'https://code.jquery.com/jquery-3.2.1.min.js', array(), '20151215', false );


	wp_enqueue_script( 'psychics-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'psychics_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Create logo section in Customizer
 */
function theme_customizer_logo($wp_customize)
{

    $wp_customize->add_section('logo_section', array(
        'title' => __('Site logo', 'sfgcjm'),
        'priority' => 30,
        'description' => 'Upload a logo',
    ));

    $wp_customize->add_setting('theme_logo', array(
//        'default' => get_bloginfo('template_directory') . '/images/logo.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_logo', array(

        'label' => __('Current logo', 'sfgcjm'),
        'section' => 'logo_section',
        'settings' => 'theme_logo',
    )));

}

add_action('customize_register', 'theme_customizer_logo');


/*--------------------------------------------------------------
#Add section in customizer for site social icons
--------------------------------------------------------------*/
function customizer_social_media_array()
{
    $social_sites = array('facebook', 'linkedin', 'twitter', 'google-plus   ');
    return $social_sites;
}

add_action('customize_register', 'add_social_sites_customizer');

function add_social_sites_customizer($wp_customize)
{

    $wp_customize->add_section('social_settings', array(
        'title' => __('Social Media Icons', 'sfgcjm'),
        'priority' => 35,
    ));

    $social_sites = customizer_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'sfgcjm'),
            'section' => 'social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/*--------------------------------------------------------------
#Add section in customizer for site social icons
--------------------------------------------------------------*/
function social_media_icons()
{
    $social_sites = customizer_social_media_array();
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
    if (!empty($active_sites)) {
        echo "<ul class='social-icons'>";
        foreach ($active_sites as $active_site) {
            $class = 'fa fa-' . $active_site;
            if ($active_site == 'email') {
                ?>
                <li>
                    <a class="email" target="_blank"
                       href="mailto:<?php echo antispambot(is_email(get_theme_mod($active_site))); ?>">
                        <span class="fa fa-envelope" title="<?php _e('email icon', 'sfgcjm'); ?>"></span>
                    </a>
                </li>
            <?php } elseif ($active_site == 'pinterest') {
                ?>
                <li>
                    <a class="<?php echo $active_site; ?>" target="_blank"
                       href="<?php echo esc_url(get_theme_mod($active_site)); ?>"
                       title="<?php printf(__('%s', 'sfgcjm'), $active_site); ?>">
                        <span class="<?php echo esc_attr($class . '-p'); ?>"></span>
                    </a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="<?php echo $active_site; ?>" target="_blank"
                       href="<?php echo esc_url(get_theme_mod($active_site)); ?>"
                       title="<?php printf(__('%s', 'sfgcjm'), $active_site); ?>">
                        <span class="<?php echo esc_attr($class); ?>"></span>
                    </a>
                </li>
                <?php
            }
        }
        echo "</ul>";
    }
}
//function get_posts_by_category($id = null)
//{
//    $args = array(
//        'post_type' => 'psychics',
//        'order' => 'ASC',
//        'posts_per_page' => -1
//    );
//
//    if ($id) {
//        $args['tax_query'] = array(
//            array(
//                'taxonomy' => 'psychics',
//                'field' => $id,
//            )
//        );
//    }
//
//    return get_posts($args);
//}