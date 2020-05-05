<?php

/**
 * Meta box schema fields for event type
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

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-event">
  <h3>Event</h3>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="startDate">
    <label class="rmp-schema-input__label" for="rmp-schema-startDate">
      <?php echo ( esc_html__( 'Start Date', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-startDate"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The start date/time in ISO 8601 format. For example %s', 'rate-my-post'), '2013-09-14T21:30' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="endDate">
    <label class="rmp-schema-input__label" for="rmp-schema-endDate">
      <?php echo ( esc_html__( 'End Date', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-endDate"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The end date/time in ISO 8601 format. For example %s', 'rate-my-post'), '2013-09-14T21:30' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="eventAttendanceMode">
    <label class="rmp-schema-input__label" for="rmp-schema-eventAttendanceMode">
      <?php echo ( esc_html__( 'Attendance Mode', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-eventAttendanceMode"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Online of offline', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="eventStatus">
    <label class="rmp-schema-input__label" for="rmp-schema-eventStatus">
      <?php echo ( esc_html__( 'Event Status', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-eventStatus"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Scheduled, rescheduled cancelled etc', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="performer">
    <label class="rmp-schema-input__label" for="rmp-schema-performer">
      <?php echo ( esc_html__( 'Performer', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-performer"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Performer at the event', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input rmp-schema-input--series js-rmp-schema-repeater" data-schema-key-repeater="address">
    <div class="rmp-schema-input__single-repeater js-rmp-single-from-repeater">
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
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('The postal code.', 'rate-my-post') ?>.
          </p>
        </div>
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


  <div class="rmp-schema-input rmp-schema-input--series js-rmp-schema-repeater" data-schema-key-repeater="offers">
    <div class="rmp-schema-input__single-repeater js-rmp-single-from-repeater">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="availability" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label" for="rmp-schema-availability">
          <?php echo ( esc_html__( 'Offers - Availability', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-availability"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('Availability of the product. For example %s for in stock products and %s for preorder products', 'rate-my-post'), 'http://schema.org/InStock', 'http://schema.org/PreOrder' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceValidUntil" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label" for="rmp-schema-priceValidUntil">
          <?php echo ( esc_html__( 'Offers - Price Valid Until', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-priceValidUntil"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The date until the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="url" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label" for="rmp-schema-url">
          <?php echo ( esc_html__( 'Offers - URL', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-url"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('URL to where the product can be bought', 'rate-my-post') ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="price" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label" for="rmp-schema-price">
          <?php echo ( esc_html__( 'Offers - Price', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-price"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceCurrency" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label" for="rmp-schema-priceCurrency">
          <?php echo ( esc_html__( 'Offers - Price Currency', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-priceCurrency"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The price currency. For example %s for US Dollars', 'rate-my-post'), 'USD' ); ?>.
          </p>
        </div>
      </div>
    </div>
    <div class="rmp-schema-input__repeat">
      <span class="rmp-schema-input__repeat__add js-rmp-schema-field-add-repeater">
        <?php echo esc_html__( 'Add New', 'ratemypost' ) ?>
      </span>
      <span class="rmp-schema-input__repeat__remove js-rmp-schema-field-remove-repeater">
        <?php echo esc_html__( 'Remove', 'ratemypost' ) ?>
      </span>
    </div>
  </div>


</div>
