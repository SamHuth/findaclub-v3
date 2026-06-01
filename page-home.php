<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$posts = Timber::get_posts([
    'post_type' => 'club',
    'posts_per_page' => 20,
    'meta_key' => 'is_premium',
    'orderby' => array(
        'is_premium' => 'DESC',
        'title' => 'ASC',
    ),
]);
$context['type']  = 'home';

$context['posts'] = $posts;

$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
$context['featured_image_url'] = get_the_post_thumbnail_url($timber_post->ID);

$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
