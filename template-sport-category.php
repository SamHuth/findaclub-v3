<?php
/**
 * Template Name: Sport Category Page
*/

use Timber\URLHelper;

$context = Timber::context();
$sport = URLHelper::get_params(0);
$context['sport'] = $sport;
$context['sport_name'] = str_replace("-", " ", $sport);

// Page Data
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;
$context['featured_image_url'] = get_the_post_thumbnail_url($timber_post->ID);


// Clubs Lists
$posts = Timber::get_posts([
    'post_type' => 'club',
    'sport' => $sport,
    'posts_per_page' => -1,
    'meta_key' => 'is_premium',
    'orderby' => array(
        'is_premium' => 'DESC',
        'title' => 'ASC',
    ),
]);

// Premium Clubs
$premium_clubs = array_filter( $posts->to_array(), fn( $club ) => $club->meta('is_premium') == 1 );

foreach( $premium_clubs as $club){
    $club_state_terms = get_the_terms( $club->ID, 'state' );
    if($club_state_terms){
        $club->permalink = "/" . $sport . "/" . strtolower($club_state_terms[0]->name) . "/" . $club->slug;
    } else {
        $club->permalink = "/";
    }
}

$context['premium_clubs'] = $premium_clubs;

// Sporting Club Count
$context['count'] = count($posts);

// Terms
$states = [];

foreach( $posts as $club ){
    
    $club_states = get_the_terms( get_the_ID(), 'state' );
    $club_leagues = get_the_terms( get_the_ID(), 'league' );

    if ( $club_states && ! is_wp_error( $club_states ) ) {
        foreach ( $club_states as $term ) {
            $states[ $term->term_id ] = strtolower($term->name);
        }
    }
}

$context['states'] = $states;

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page-sport-category.twig' ), $context );