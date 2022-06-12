<?php
/**
 * Multi directory navigation template.
 * Mostly used on listings archive view.
 *
 * @author  wpWax
 * @since   6.6
 * @version 7.0.5.3
 */

use \Directorist\Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

//e_var_dump($listings->listing_types);
$listing_types = $listings->listing_types;
$sort_order = array('Stays', 'Attractions', 'Entertainment', 'Tours', 'Foods');
$updated_listing_types = array();

foreach($sort_order as $type){
    foreach($listing_types as $listing_id=>$listing_type){
        if( $listing_type['name'] == $type )
            $updated_listing_types[$listing_id] = $listing_type;
    }
}

$current_directory_type = ( ! empty( $_GET['directory_type'] ) ? $_GET['directory_type'] : '' );

do_action( 'directorist_before_listing_types', $listings );
?>
<div class="<?php Helper::directorist_container_fluid(); ?>">
	<div class="directorist-type-nav">
		<ul class="directorist-type-nav__list">

			<?php if ( ! empty( $all_types ) ) : ?>

				<li class="list-inline-item <?php echo ( $listings->current_listing_type === 'all' || 'all' === $current_directory_type ) ? 'current' : ''; ?>">
					<a class="directorist-type-nav__link" href="<?php echo esc_url( directorist_get_directory_type_nav_url( 'all' ) ); ?>"><?php esc_html_e( 'All', 'directorist' ); ?></a>
				</li>

			<?php endif; ?>

			<?php foreach ( $updated_listing_types as $id => $value ) : ?>

				<li class="<?php echo ( ( $listings->current_listing_type === $value['term']->term_id && 'all' !== $current_directory_type ) ? 'current': '' ); ?>">
					<a class="directorist-type-nav__link" href="<?php echo esc_url( directorist_get_directory_type_nav_url( $value['term']->slug ) ); ?>"><span class="<?php echo esc_attr( $value['data']['icon'] );?>"></span> <?php echo esc_html( $value['name'] );?></a>
				</li>

			<?php endforeach; ?>

		</ul>
	</div>
</div>
