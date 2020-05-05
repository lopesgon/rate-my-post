<?php

/**
 * Meta box schema fields for localbusiness type
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
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-localbusiness">
  <h3>LocalBusiness</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="priceRange">
    <label class="rmp-schema-input__label" for="rmp-schema-priceRange">
      <?php echo ( esc_html__( 'Price Range', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-priceRange"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The price range of the business. For example %s for inexpensive and %s for expensive', 'rate-my-post'), '$', '$$$$' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="telephone">
    <label class="rmp-schema-input__label" for="rmp-schema-telephone">
      <?php echo ( esc_html__( 'Telephone', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-telephone"
    >
  </div>

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="address">
    <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressLocality" data-schema-key-parent="address">
        <label class="rmp-schema-input__label" for="rmp-schema-addressLocality">
          <?php echo ( esc_html__( 'Address - Locality', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-addressLocality"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The locality in which the street address is. For example %s', 'rate-my-post'), 'Mountain View' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressRegion" data-schema-key-parent="address">
        <label class="rmp-schema-input__label" for="rmp-schema-addressRegion">
          <?php echo ( esc_html__( 'Address - Region', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-addressRegion"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The region in which the locality is. For example %s', 'rate-my-post'), 'California' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="postalCode" data-schema-key-parent="address">
        <label class="rmp-schema-input__label" for="rmp-schema-postalCode">
          <?php echo ( esc_html__( 'Address - Postal Code', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-postalCode"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="streetAddress" data-schema-key-parent="address">
        <label class="rmp-schema-input__label" for="rmp-schema-streetAddress">
          <?php echo ( esc_html__( 'Address - Street Address', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-streetAddress"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressCountry" data-schema-key-parent="address">
        <label class="rmp-schema-input__label" for="rmp-schema-addressCountry">
          <?php echo ( esc_html__( 'Address - Country', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-addressCountry"
        >
      </div>
    </div>
  </div>

</div>
