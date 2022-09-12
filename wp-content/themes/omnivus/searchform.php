<?php
/**
 * Template for displaying search forms.
 *
 * @Package Omnivus
 *
 */
?>

<?php
add_filter('get_search_form', function ($form) {
    $form = '<form class="search-form" action="' . esc_url(home_url('/')) . '">
                <input  name="s" placeholder="' . esc_attr__('Search...', 'omnivus') . '" type="search">
                <button type="submit"><i class="ti-search"></i></button>
            </form>';
    return $form;
});