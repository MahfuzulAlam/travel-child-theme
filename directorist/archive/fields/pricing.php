<?php
/**
 * @author  wpWax
 * @since   6.6
 * @version 6.7
 */

use \Directorist\Helper;

if ( ! defined( 'ABSPATH' ) ) exit;

$id = get_the_ID();
$directory_type = get_post_meta( $post_id, '_directory_type', true );
//echo $directory_type = $directory_type && !empty($directory_type) ? get_term_by('id', $directory_type)->name: '';

if ( !Helper::has_price_range( $id ) && !Helper::has_price( $id ) ) {
	return;
}
?>

<span class="directorist-info-item directorist-pricing-meta tf-pricing-meta">
    <?php
    if($directory_type == 89 && 'price' === Helper::pricing_type( $id )){
        echo '<span class="starts_from_list">Starts from </span>';
    }
    ?>
	<?php
	if ( 'range' === Helper::pricing_type( $id ) ) {
		Helper::price_range_template( $id );
	}
	elseif ( !$listings->is_disable_price ) {
		Helper::price_template( $id );
	}
	?>
</span>