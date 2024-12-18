<?php
/**
 * Soboa 95 ans functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Soboa_95_ans
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function soboa95ans_setup() {
	load_theme_textdomain('soboa95ans', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'soboa95ans'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'soboa95ans_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support('customize-selective-refresh-widgets');

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'soboa95ans_setup');

/**
 * Set the content width in pixels
 */
function soboa95ans_content_width() {
	$GLOBALS['content_width'] = apply_filters('soboa95ans_content_width', 640);
}
add_action('after_setup_theme', 'soboa95ans_content_width', 0);

/**
 * Register widget area
 */
function soboa95ans_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'soboa95ans'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'soboa95ans'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'soboa95ans_widgets_init');

/**
 * Enqueue scripts and styles
 */
function soboa95ans_scripts() {
	wp_enqueue_style('soboa95ans-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('soboa95ans-style', 'rtl', 'replace');
	wp_enqueue_script('soboa95ans-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'soboa95ans_scripts');

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Slides post type
 */
function soboa95ans_register_slides_post_type() {
	$labels = array(
		'name'               => 'Slides',
		'singular_name'      => 'Slide',
		'menu_name'          => 'Slides',
		'add_new'            => 'Ajouter un slide',
		'add_new_item'       => 'Ajouter un nouveau slide',
		'edit_item'          => 'Modifier le slide',
		'new_item'           => 'Nouveau slide',
		'view_item'          => 'Voir le slide',
		'search_items'       => 'Rechercher des slides',
		'not_found'          => 'Aucun slide trouvé',
		'not_found_in_trash' => 'Aucun slide trouvé dans la corbeille'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'slides'),
		'capability_type'    => 'post',
		'menu_icon'          => 'dashicons-images-alt2',
		'supports'           => array('title', 'editor', 'thumbnail')
	);

	register_post_type('slides', $args);
}
add_action('init', 'soboa95ans_register_slides_post_type');

/**
 * Hide admin bar
 */
function masquer_barre_admin() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
	show_admin_bar(false);
}
add_action('after_setup_theme', 'masquer_barre_admin');

/**
 * Enqueue custom scripts and styles
 */
function soboa95ans_custom_scripts() {
	// Styles
	wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
	wp_enqueue_style('soboa95ans-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');
	wp_enqueue_style('soboa95ans-custom', get_template_directory_uri() . '/custom.css');
	wp_enqueue_style('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css');

	// Scripts
	wp_enqueue_script('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);
	wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', true);
	wp_enqueue_script('masonry-js', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array(), '4.0.0', true);
	wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), '1.0.0', true);
	wp_enqueue_script('imagesloaded', 'https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js', array('jquery'), '5.0.0', true);

	wp_enqueue_script('soboa95ans-customsscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'soboa95ans_custom_scripts');

// Ajouter le champ personnalisé dans le menu
function soboa95ans_add_menu_image_field($item_id, $item) {
    $menu_image = get_post_meta($item_id, '_menu_item_image', true);
    ?>
<div class="field-image description description-wide">
    <label for="menu-item-image-<?php echo $item_id; ?>">
        <?php _e('Image du menu', 'soboa95ans'); ?>
    </label>
    <div class="menu-item-image-container">
        <?php if($menu_image) : ?>
        <img src="<?php echo esc_url($menu_image); ?>" class="menu-item-image-preview">
        <?php endif; ?>
        <input type="hidden" class="menu-item-image-url" name="menu-item-image[<?php echo $item_id; ?>]"
            value="<?php echo esc_attr($menu_image); ?>">
        <button type="button" class="upload-menu-item-image button">
            <?php _e('Choisir une image', 'soboa95ans'); ?>
        </button>
        <button type="button" class="remove-menu-item-image button"
            <?php echo empty($menu_image) ? 'style="display:none;"' : ''; ?>>
            <?php _e('Supprimer', 'soboa95ans'); ?>
        </button>
    </div>
</div>
<?php
}
add_action('wp_nav_menu_item_custom_fields', 'soboa95ans_add_menu_image_field', 10, 2);

// Sauvegarder l'image
function soboa95ans_save_menu_image($menu_id, $menu_item_db_id) {
    if(isset($_POST['menu-item-image'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_image', $_POST['menu-item-image'][$menu_item_db_id]);
    }
}
add_action('wp_update_nav_menu_item', 'soboa95ans_save_menu_image', 10, 2);

// Ajouter le JavaScript nécessaire
function soboa95ans_admin_menu_scripts() {
    if(get_current_screen()->base !== 'nav-menus') return;
    
    wp_enqueue_media();
    
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            $(document).on("click", ".upload-menu-item-image", function(e) {
                e.preventDefault();
                var button = $(this);
                var container = button.closest(".menu-item-image-container");
                var imageInput = container.find(".menu-item-image-url");
                var preview = container.find(".menu-item-image-preview");
                var removeButton = container.find(".remove-menu-item-image");
                
                var frame = wp.media({
                    title: "Sélectionner une image",
                    multiple: false
                });
                
                frame.on("select", function() {
                    var attachment = frame.state().get("selection").first().toJSON();
                    imageInput.val(attachment.url);
                    
                    if(!preview.length) {
                        preview = $("<img>", {class: "menu-item-image-preview"});
                        container.prepend(preview);
                    }
                    preview.attr("src", attachment.url);
                    removeButton.show();
                });
                
                frame.open();
            });
            
            $(document).on("click", ".remove-menu-item-image", function(e) {
                e.preventDefault();
                var container = $(this).closest(".menu-item-image-container");
                container.find(".menu-item-image-preview").remove();
                container.find(".menu-item-image-url").val("");
                $(this).hide();
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'soboa95ans_admin_menu_scripts');