<?php

/**
 * Meta box schema fields for movie type
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
  $movie = false;
  if( $schema_type === 'Movie' ) {
    $movie = true;
  };
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-type js-rmp-schema-movie <?php echo ($movie) ? 'rmp-customize-mb__schema__schema-field--selected' : ''; ?>">
  <h3>Movie</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="dateCreated">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Date Created', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $movie && array_key_exists('dateCreated', $schema_details) ) ? $schema_details['dateCreated'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The date on which the CreativeWork was created in ISO 8601 format. For example %s', 'rate-my-post'), '2020-04-14' ); ?>.
      </p>
    </div>

  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="director">
    <label class="rmp-schema-input__label" for="rmp-schema-director">
      <?php echo ( esc_html__( 'Director', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-director"
      value="<?php echo ( $movie && array_key_exists('director', $schema_details) ) ? $schema_details['director'] : ''; ?>"
    >
  </div>
  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="offers">

    <?php if( $movie && array_key_exists('offers', $schema_details) && !empty($schema_details['offers']) ): ?>
      <?php foreach( $schema_details['offers'] as $offer ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex">

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="availability" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Availability', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $movie && array_key_exists('availability', $offer) ) ? $offer['availability'] : ''; ?>"
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
              value="<?php echo ( $movie && array_key_exists('priceValidUntil', $offer) ) ? $offer['priceValidUntil'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                  <?php echo sprintf( esc_html__('The date until the price is valid. For example %s', 'rate-my-post'), '2013-09-14' ); ?>.
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
              value="<?php echo ( $movie && array_key_exists('url', $offer) ) ? $offer['url'] : ''; ?>"
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
              value="<?php echo ( $movie && array_key_exists('price', $offer) ) ? $offer['price'] : ''; ?>"
            >
          </div>

          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="priceCurrency" data-schema-key-parent="offers">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Offers - Price Currency', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $movie && array_key_exists('priceCurrency', $offer) ) ? $offer['priceCurrency'] : ''; ?>"
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
