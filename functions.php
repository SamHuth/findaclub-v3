<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 */

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/src/StarterSite.php';

Timber\Timber::init();

// Sets the directories (inside your theme) to find .twig files.
Timber::$dirname = [ 'templates', 'views' ];

new StarterSite();

function get_state_name($state_code = ''){
    switch(strtolower($state_code)){
        case 'qld':
            return 'Queensland';
        case 'nsw':
            return 'New South Wales';
        case 'vic':
            return 'Victoria';
        case 'sa':
            return 'South Australia';
        case 'act':
            return 'Australian Capital Territory';
        case 'wa':
            return 'Western Australia';
        case 'nt':
            return 'Northern Territory';
        case 'tas':
            return 'Tasmania';
        default:
            return 'undefined';
        
    }
}

function get_state_code($state_name = ''){
    switch(strtolower($state_name)){
        case  'Queensland':
            return 'qld';
        case  'New South Wales':
            return 'nsw';
        case  'Victoria':
            return 'vic';
        case  'South Australia':
            return 'sa';
        case  'Australian Capital Territory':
            return 'act';
        case  'Western Australia':
            return 'wa';
        case  'Northern Territory':
            return 'nt';
        case  'Tasmania':
            return 'tas';
        default:
            return 'undefined';
    }
}

// Breadcrumbs
add_filter( 'timber/context', function( $context ) {

    $path = trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

    if ( empty( $path ) ) {
        $context['breadcrumbs'] = '';
        return $context;
    }

    $segments = array_filter( explode( '/', $path ) );
    $url      = home_url( '/' );
    $position = 1;
    $items    = [];

    $items[] = sprintf(
        '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%s"><span itemprop="name">HOME</span></a><meta itemprop="position" content="%d" /></li>',
        esc_url( $url ),
        $position
    );

    foreach ( $segments as $segment ) {
        $position++;
        $url  .= $segment . '/';
        $label = strtoupper( str_replace( '-', ' ', $segment ) );

        $items[] = sprintf(
            '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="%s"><span itemprop="name">%s</span></a><meta itemprop="position" content="%d" /></li>',
            esc_url( $url ),
            esc_html( $label ),
            $position
        );
    }

    $context['breadcrumbs'] = '<ol itemscope itemtype="https://schema.org/BreadcrumbList">' . implode( '', $items ) . '</ol>';

    return $context;
} );
