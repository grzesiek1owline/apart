<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'cpt']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

add_image_size( 'gallery', 410, 488, true );


// AJAX

function get_floors_select() {
    $id =  $_POST[budynek]['id'];
    $html = '';
    global $post;
    if( have_rows('bulding-flats', $id) ):
        while( have_rows('bulding-flats', $id) ):
            the_row();
            $html .= '<option value="'. get_sub_field('name') .'">'. get_sub_field('name') .'</option>';
        endwhile;
    else:
        $html = 'error';
    endif;

    echo $html;
    wp_die();
}

function get_floors_info() {
    $value = $_POST[data]['value'];
    $id = $_POST[data]['id'];
    $template = floor_template();
    $html = '';
    $file_url = '';

    if( have_rows('bulding-flats', $id) ):
        while( have_rows('bulding-flats', $id) ):
            the_row();
            $name = get_sub_field('name');
            if($name == $value) {
                $file = get_sub_field('plan');
                $file_url = $file['url'];
                $flats = get_sub_field('flats');

                if($flats) {
                    foreach($flats as $id) {
                        $title = get_the_title($id);
                        $size = get_field('flat-size', $id);
                        $others = get_field('flat-others-size', $id);
                        if(!$others) {
                            $others = '-';
                        }
                        $rooms = get_field('flat-rooms', $id);
                        $pdf = get_field('flat-pdf', $id);
                        $pdf_url = $pdf['url'];
                        $status = get_field('flat-status', $id);

                        if(get_field('flat-status', $id)):
                            $status = '<p style="color: red">Sprzedane</p>';
                        else:
                            $status = '<p style="color: green">Dostępne</p>';
                        endif;
                        $html .= '<tr>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'">'.$title.'</a></td>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'">'.$size.'</a></td>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'">'.$others.'</a></td>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'">'.$rooms.'</a></td>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'"><i class="c-icon c-icon--pdf"></i></a></td>';
                        $html .= '<td><a target="_blank" href="'.$pdf_url.'">'.$status.'</a></td>';
                        $html .= '</tr>';
                    }
                }

                $out = str_replace('{{FLATS}}', $html, $template);
                $out = str_replace('{{URL}}', $file_url, $out);
                $out = str_replace('{{NAME}}', $value, $out);
                echo $out;
                break;
                wp_die();
            }
        endwhile;
    else:
        $html = 'error';
    endif;
    wp_die();
}

function floor_template(){
    return '<div class="c-floor">
    <div class="c-floor__plan">
    <a href="{{URL}}" data-lightbox="{{NAME}}">
        <img src="{{URL}}" alt="{{NAME}}">
    </a>
    </div>
    <div class="c-floor__table">
      <table class="c-table">
        <thead>
          <tr>
            <th>Lp.</th>
            <th>Powierzchnia</th>
            <th>Taras/Ogródek</th>
            <th>Liczba pokoi</th>
            <th>Plan PDF</th>
            <th>Status</th>
          </tr>
         </thead>
         <tbody>
            {{FLATS}}
         </tbody>
      </table>
    </div>
  </div>';
}
