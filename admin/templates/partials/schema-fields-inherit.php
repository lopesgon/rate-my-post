<?php

/**
 * Meta box schema fields for product type
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      3.2.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/admin/templates/partials
 */
?>

<?php
  if ( ! defined( 'WPINC' ) ) {
  	die;
  }

  $not_required = false;
  if( !$schema_type ) {
    $not_required = true;
  }
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-type js-rmp-schema-inherit <?php echo ($not_required) ? 'rmp-customize-mb__schema__schema-field--selected' : ''; ?>">
  <p><?php echo esc_html__( 'Structured data type selected in the Rate my Post settings will be used!' ) ?></p>
</div>
