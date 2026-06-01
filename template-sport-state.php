<?php
/**
 * Template Name: Sport State Page
*/

$context = Timber::context();

// Page Data
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page-sport-state.twig' ), $context );