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
  $localBusiness = false;
  if( $schema_type === 'LocalBusiness' ) {
    $localBusiness = true;
  };
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-type js-rmp-schema-localbusiness <?php echo ($localBusiness) ? 'rmp-customize-mb__schema__schema-field--selected' : ''; ?>">
  <h3>LocalBusiness</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="priceRange">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Price Range', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $localBusiness && array_key_exists('priceRange', $schema_details) ) ? $schema_details['priceRange'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The price range of the business. For example %s for inexpensive and %s for expensive', 'rate-my-post'), '$', '$$$$' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="telephone">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Telephone', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $localBusiness && array_key_exists('telephone', $schema_details) ) ? $schema_details['telephone'] : ''; ?>"
    >
  </div>

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="address">
    <?php if( $localBusiness && array_key_exists('address', $schema_details) && !empty($schema_details['address']) ): ?>
      <?php foreach( $schema_details['address'] as $address ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressLocality" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Locality', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $localBusiness && array_key_exists('addressLocality', $address) ) ? $address['addressLocality'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The locality in which the street address is. For example %s', 'rate-my-post'), 'Mountain View' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressRegion" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Region', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $localBusiness && array_key_exists('addressRegion', $address) ) ? $address['addressRegion'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The region in which the locality is. For example %s', 'rate-my-post'), 'California' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="postalCode" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Postal Code', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $localBusiness && array_key_exists('postalCode', $address) ) ? $address['postalCode'] : ''; ?>"
            >
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="streetAddress" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Street Address', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $localBusiness && array_key_exists('streetAddress', $address) ) ? $address['streetAddress'] : ''; ?>"
            >
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressCountry" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Country', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $localBusiness && array_key_exists('addressCountry', $address) ) ? $address['addressCountry'] : ''; ?>"
            >
          </div>
        </div>
      <?php endforeach; ?>

    <?php else: ?>

    <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressLocality" data-schema-key-parent="address">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Address - Locality', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The locality in which the street address is. For example %s', 'rate-my-post'), 'Mountain View' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressRegion" data-schema-key-parent="address">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Address - Region', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The region in which the locality is. For example %s', 'rate-my-post'), 'California' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="postalCode" data-schema-key-parent="address">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Address - Postal Code', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="streetAddress" data-schema-key-parent="address">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Address - Street Address', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressCountry" data-schema-key-parent="address">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Address - Country', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
      </div>
    </div>
    <?php endif; ?>
  </div>

</div>
