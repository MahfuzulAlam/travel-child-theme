<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 6.7
 */

use \Directorist\Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

$listing_types = $searchform->get_listing_type_data();
$sort_order = array('Stays', 'Attractions', 'Entertainment', 'Tours', 'Foods');
$updated_listing_types = array();

foreach($sort_order as $type){
    foreach($listing_types as $listing_id=>$listing_type){
        if( $listing_type['name'] == $type )
            $updated_listing_types[$listing_id] = $listing_type;
    }
}

?>

<div class="<?php Helper::directorist_container_fluid(); ?>">
	<ul class="directorist-listing-type-selection">
        <?php if(!empty($updated_listing_types)):?>
            <?php foreach ( $updated_listing_types as $id => $value ): ?>

                <li class="directorist-listing-type-selection__item"><a class="search_listing_types directorist-listing-type-selection__link<?php echo $searchform->get_default_listing_type() == $id ? '--current': ''; ?>" data-listing_type="<?php echo esc_attr( $value['term']->slug );?>" data-listing_type_id="<?php echo esc_attr( $id );?>" href="#"><span class="<?php echo esc_html( $value['data']['icon'] );?>"></span> <?php echo esc_html( $value['name'] );?></a></li>

            <?php endforeach; ?>
        <?php endif;?>
	</ul>
</div>