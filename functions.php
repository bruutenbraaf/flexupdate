<?php

add_image_size('home', 1920, 600, true);

add_theme_support('post-thumbnails');

function flexupdate_scripts()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('share', get_template_directory_uri() . '/js/jquery.c-share.js', array(), '1.0.0', true);
	wp_enqueue_script('emergence', get_template_directory_uri() . '/js/emergence.min.js', array(), '1.0.0', false);
	wp_enqueue_script('bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);
	wp_enqueue_script('readmore', get_template_directory_uri() . '/js/readmore.min.js', array(), '1.0.0', false);
	wp_enqueue_script('slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);
	wp_enqueue_script('niceselect', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '1.0.0', true);

	wp_enqueue_style('bootcss', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('niceselectcss', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

	wp_enqueue_style('fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
}
add_action('wp_enqueue_scripts', 'flexupdate_scripts');


add_action('wp_logout', 'ps_redirect_after_logout');
function ps_redirect_after_logout()
{
	wp_redirect('https://flexupdate.nl');
	exit();
}

// Add option page

acf_add_options_page(array(

	'page_title' 	=> 'Website informatie',
	'menu_title' 	=> 'Logo & Opties',
	'menu_slug' 	=> 'website-informatie',
	'capability' 	=> 'edit_posts',
	'icon_url' => 'dashicons-universal-access-alt',
	'position' => 3

));

function my_cpt_support_author()
{
	add_post_type_support('nieuws', 'author');
}
add_action('init', 'my_cpt_support_author');

/**
 * Add HTML5 theme support.
 */
function wpdocs_after_setup_theme()
{
	add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'wpdocs_after_setup_theme');


if (!function_exists('get_archive_link')) {
	function get_archive_link($post_type)
	{
		global $wp_post_types;
		$archive_link = false;
		if (isset($wp_post_types[$post_type])) {
			$wp_post_type = $wp_post_types[$post_type];
			if ($wp_post_type->publicly_queryable)
				if ($wp_post_type->has_archive && $wp_post_type->has_archive !== true)
					$slug = $wp_post_type->has_archive;
				else if (isset($wp_post_type->rewrite['slug']))
					$slug = $wp_post_type->rewrite['slug'];
				else
					$slug = $post_type;
			$archive_link = get_option('siteurl') . "/{$slug}/";
		}
		return apply_filters('archive_link', $archive_link, $post_type);
	}
}

function register_my_menus()
{
	register_nav_menus(
		array(
			'main_menu' => __('Hoofd Menu'),
			'mobile_menu' => __('Mobiele Menu'),
			'hamburger' => __('Hamburger Menu'),
			'side_menu' => __('Zijkant Menu'),
			'socket_menu' => __('Socket Menu')
		)
	);
}
add_action('init', 'register_my_menus');


if (!function_exists('wpex_pagination')) {

	function wpex_pagination()
	{

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if ($total > 1) {
			if (!$current_page = get_query_var('paged'))
				$current_page = 1;
			if (get_option('permalink_structure')) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo paginate_links(array(
				'base'			=> str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'		=> $format,
				'current'		=> max(1, get_query_var('paged')),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'prev_text' => '
        <span class="prev">
        <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.371323 11.0673L10.6382 0.38635C11.1333 -0.128784 11.9361 -0.128784 12.4312 0.38635L13.6286 1.63211C14.123 2.14637 14.1239 2.97983 13.6308 3.49529L5.49412 12L13.6308 20.5047C14.1239 21.0202 14.123 21.8536 13.6286 22.3679L12.4312 23.6136C11.936 24.1288 11.1333 24.1288 10.6381 23.6136L0.371376 12.9327C-0.123782 12.4176 -0.123782 11.5824 0.371323 11.0673Z" fill="#545A63"/>
        </svg>        
        </span>',
				'next_text' => '<span class="next"> 
                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.6287 12.9327L3.36185 23.6136C2.86669 24.1288 2.06392 24.1288 1.56881 23.6136L0.371356 22.3679C-0.122957 21.8536 -0.123907 21.0202 0.369243 20.5047L8.50588 12L0.369243 3.49529C-0.123907 2.97983 -0.122957 2.14637 0.371356 1.63211L1.56881 0.38635C2.06397 -0.128783 2.86674 -0.128783 3.36185 0.38635L13.6286 11.0673C14.1238 11.5824 14.1238 12.4176 13.6287 12.9327Z" fill="#545A63"/>
                            </svg>
        </span>'
			));
		}
	}
}


function arphabet_widgets_init()
{

	register_sidebar(array(
		'name'          => 'Footer een',
		'id'            => 'footer_1',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer twee',
		'id'            => 'footer_2',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer drie',
		'id'            => 'footer_3',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer drie',
		'id'            => 'footer_4',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

add_action('widgets_init', 'arphabet_widgets_init');

function new_excerpt_more($more)
{
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}

function content($limit)
{
	$content = explode(' ', get_the_content(), $limit);

	if (count($content) >= $limit) {
		array_pop($content);
		$content = implode(" ", $content) . '...';
	} else {
		$content = implode(" ", $content);
	}

	$content = preg_replace('/\[.+\]/', '', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;
}



function my_acf_init()
{

	acf_update_setting('google_api_key', 'AIzaSyBwjs5yVQERqyM-MUa52sJa1a7jeBHiEes');
}

add_action('acf/init', 'my_acf_init');




// Option pages for archive + auto fields (titel, intro)
function option_page_posttypes()
{
	$args  = array('public'   => true, '_builtin' => false);
	$excluded_post_types = array('participation', 'partners');
	$custom_post_types = get_post_types($args);
	foreach ($custom_post_types as $custom_post_type) {
		if (in_array($custom_post_type, $excluded_post_types)) {
		} else {
			if (function_exists('acf_add_options_page')) {

				$formated_string = str_replace('_', " ", $custom_post_type);

				acf_add_options_sub_page(array(
					'page_title'     => 'Archive options ' . $formated_string . '',
					'menu_title'    => 'Archive options ' . $formated_string . '',
					'parent_slug'    => 'edit.php?post_type=' . $custom_post_type . '',
				));

				$prefix = str_replace("_", "-", $custom_post_type);
				$acf_pre = 'acf-options-archive-options-';
				$compiled_acf = $acf_pre .= $prefix;

				acf_add_local_field_group(array(
					'key' => 'archive_options_' . $custom_post_type . '',
					'title' => 'Archive options ' . $formated_string . '',
					'fields' => array(
						array(
							'key' => '' . $custom_post_type . '_archive_title',
							'label' => 'Archief titel',
							'name' => '' . $custom_post_type . '_archive_title',
							'type' => 'text',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_title", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array(
							'key' => '' . $custom_post_type . '_archive_intro',
							'label' => 'Archief intro',
							'name' => '' . $custom_post_type . '_archive_intro',
							'type' => 'wysiwyg',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_intro", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
					),
					'location' => array(
						array(
							array(
								'param' => 'options_page',
								'operator' => '==',
								'value' => $compiled_acf,
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
				));
			}
		}
	}
}
add_action('init', 'option_page_posttypes');


// adds shortcode for social media
add_shortcode('mailchimp', 'mailchimp');
function mailchimp()
{
	ob_start();
	get_template_part('template-parts/mailchimp');
	$output = ob_get_clean();
	return $output;
}


add_shortcode('contactpersoon', 'contactpersoon');
function contactpersoon()
{
	ob_start();
	get_template_part('templates/contactpersoon');
	$output = ob_get_clean();
	return $output;
}



if (!function_exists('pietergoosen_pagination')) :

	function pietergoosen_pagination($pages = '', $range = 2)
	{
		$showitems = ($range * 2) + 1;

		global $paged;
		if (empty($paged)) $paged = 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}

		if (1 != $pages) {
			$string = _x('Page %1$s of %2$s', '%1$s = current page, %2$s = all pages', 'pietergoosen');
			echo "<div class='pagination'><span>" . sprintf($string, $paged, $pages) . "</span>";
			if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>" . __('&laquo; First', 'pietergoosen') . "</a>";
			if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>" . __('&lsaquo; Previous', 'pietergoosen') . "</a>";

			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
				}
			}

			if ($paged < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged + 1) . "'>" . __('Next &rsaquo;', 'pietergoosen') . "</a>";
			if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>" . __('Last &raquo;', 'pietergoosen') . "</a>";
			echo "</div>\n";
		}
	} //  pietergoosen_pagination

endif;




add_action('init', 'customRSS');
function customRSS(){
        add_feed('nieuwsbrief', 'customRSSFunc');
}

function customRSSFunc(){
	get_template_part('rss', 'nieuwsbrief');
}


global $wp_rewrite;
$wp_rewrite->flush_rules();

function rssLanguage(){
	update_option('rss_language', 'en');
}
add_action('admin_init', 'rssLanguage');


function flexupdate_wpseo_canonical( $canonical ) {
	if ( is_front_page() ) {
	global $wp;
	$current_url = trailingslashit(home_url( add_query_arg( array(), $wp->request ) ) );
	return $current_url;
	} else {
	return $canonical;
	}
	}
	add_filter( 'wpseo_canonical', 'flexupdate_wpseo_canonical', 10, 1 );