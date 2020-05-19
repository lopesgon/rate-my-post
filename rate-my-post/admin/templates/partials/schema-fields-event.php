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
  $event = false;
  if( $schema_type === 'Event' ) {
    $event = true;
  };
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-type js-rmp-schema-event <?php echo ($event) ? 'rmp-customize-mb__schema__schema-field--selected' : ''; ?>">
  <h3>Event</h3>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="startDate">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Start Date', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $event && array_key_exists('startDate', $schema_details) ) ? $schema_details['startDate'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The start date/time in ISO 8601 format. For example %s', 'rate-my-post'), '2013-09-14T21:30' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="endDate">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'End Date', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $event && array_key_exists('endDate', $schema_details) ) ? $schema_details['endDate'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The end date/time in ISO 8601 format. For example %s', 'rate-my-post'), '2013-09-14T21:30' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="eventAttendanceMode">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Attendance Mode', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $event && array_key_exists('eventAttendanceMode', $schema_details) ) ? $schema_details['eventAttendanceMode'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Online of offline', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="eventStatus">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Event Status', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $event && array_key_exists('eventStatus', $schema_details) ) ? $schema_details['eventStatus'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Scheduled, rescheduled cancelled etc', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="performer">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Performer', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $event && array_key_exists('performer', $schema_details) ) ? $schema_details['performer'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo esc_html__('Performer at the event', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="organizer">
    <?php if( $event && array_key_exists('organizer', $schema_details) && !empty($schema_details['organizer']) ): ?>
      <?php foreach( $schema_details['organizer'] as $organizer ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="name" data-schema-key-parent="organizer">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Organizer - Name', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('name', $organizer) ) ? $organizer['name'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo esc_html__('Name of the organizer of the event', 'rate-my-post'); ?>.
              </p>
            </div>
          </div>
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="url" data-schema-key-parent="organizer">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Organizer - URL', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('url', $organizer) ) ? $organizer['url'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo esc_html__('Website of the organizer', 'rate-my-post'); ?>.
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
    <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="name" data-schema-key-parent="organizer">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Organizer - Name', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('Name of the organizer of the event', 'rate-my-post'); ?>.
          </p>
        </div>
      </div>
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="url" data-schema-key-parent="organizer">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Organizer - URL', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('Website of the organizer', 'rate-my-post'); ?>.
          </p>
        </div>
      </div>
    </div>
  <?php endif; ?>
  </div>

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="address">
    <?php if( $event && array_key_exists('address', $schema_details) && !empty($schema_details['address']) ): ?>
      <?php foreach( $schema_details['address'] as $address ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressLocality" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Locality', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('addressLocality', $address) ) ? $address['addressLocality'] : ''; ?>"
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
              value="<?php echo ( $event && array_key_exists('addressRegion', $address) ) ? $address['addressRegion'] : ''; ?>"
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
              value="<?php echo ( $event && array_key_exists('postalCode', $address) ) ? $address['postalCode'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo esc_html__('The postal code.', 'rate-my-post') ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="streetAddress" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Street Address', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('streetAddress', $address) ) ? $address['streetAddress'] : ''; ?>"
            >
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="addressCountry" data-schema-key-parent="address">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Address - Country', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('addressCountry', $address) ) ? $address['addressCountry'] : ''; ?>"
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
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('The postal code.', 'rate-my-post') ?>.
          </p>
        </div>
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

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="offers">

    <?php if( $event && array_key_exists('offers', $schema_details) && !empty($schema_details['offers']) ): ?>
      <?php foreach( $schema_details['offers'] as $offer ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="availability" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Availability', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('availability', $offer) ) ? $offer['availability'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('Availability of the product. For example %s for in stock products and %s for preorder products', 'rate-my-post'), 'http://schema.org/InStock', 'http://schema.org/PreOrder' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceValidUntil" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Price Valid Until', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('priceValidUntil', $offer) ) ? $offer['priceValidUntil'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The date until the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="validFrom" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Price Valid From', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('validFrom', $offer) ) ? $offer['validFrom'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The date from which the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="url" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - URL', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('url', $offer) ) ? $offer['url'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo esc_html__('URL to where the product can be bought', 'rate-my-post') ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="price" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Price', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('price', $offer) ) ? $offer['price'] : ''; ?>"
            >
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceCurrency" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Price Currency', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $event && array_key_exists('priceCurrency', $offer) ) ? $offer['priceCurrency'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The price currency. For example %s for US Dollars', 'rate-my-post'), 'USD' ); ?>.
              </p>
            </div>
          </div>

          <div class="rmp-schema-multiple-container__remove">
            <span class="rmp-schema-multiple-container__remove__btn js-rmp-schema-field-remove-repeater">
              <?php echo esc_html__( 'Remove', 'ratemypost' ) ?>
            </span>
          </div>

        </div>
      <?php endforeach; ?>

    <?php else: ?>

    <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="availability" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - Availability', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('Availability of the product. For example %s for in stock products and %s for preorder products', 'rate-my-post'), 'http://schema.org/InStock', 'http://schema.org/PreOrder' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceValidUntil" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - Price Valid Until', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The date until the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="validFrom" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - Price Valid From', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The date from which the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="url" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - URL', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo esc_html__('URL to where the product can be bought', 'rate-my-post') ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="price" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - Price', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
      </div>

      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceCurrency" data-schema-key-parent="offers">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Offers - Price Currency', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
              <?php echo sprintf( esc_html__('The price currency. For example %s for US Dollars', 'rate-my-post'), 'USD' ); ?>.
          </p>
        </div>
      </div>

      <div class="rmp-schema-multiple-container__remove">
        <span class="rmp-schema-multiple-container__remove__btn js-rmp-schema-field-remove-repeater">
          <?php echo esc_html__( 'Remove', 'ratemypost' ) ?>
        </span>
      </div>

    </div>

  <?php endif; ?>

    <div class="rmp-schema-multiple-container__add-new">
      <span class="rmp-schema-multiple-container__add-new__btn js-rmp-schema-field-add-repeater">
        <?php echo esc_html__( 'Add New', 'ratemypost' ) ?>
      </span>
    </div>

  </div>


</div>
