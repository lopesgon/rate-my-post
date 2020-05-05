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
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-product">
  <h3>Product</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="brand">
    <label class="rmp-schema-input__label" for="rmp-schema-brand">
      <?php echo ( esc_html__( 'Brand', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-brand"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo sprintf( esc_html__('Brand of the product. For example %s', 'rate-my-post'), 'Nike' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="sku">
    <label class="rmp-schema-input__label" for="rmp-schema-sku">
      <?php echo ( esc_html__( 'SKU', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-sku"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo sprintf( esc_html__('The Stock Keeping Unit. For example %s', 'rate-my-post'), 'UGG-BB-PUR-06' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="gtin-8">
    <label class="rmp-schema-input__label" for="rmp-schema-gtin">
      <?php echo ( esc_html__( 'GTIN-8', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-gtin"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('The GTIN-8 code of the product', 'rate-my-post'); ?>.
      </p>
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
