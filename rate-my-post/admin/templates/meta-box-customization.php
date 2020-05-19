<?php

/**
 * Admin template
 *
 * @link       http://wordpress.org/plugins/rate-my-post/
 * @since      3.2.0
 *
 * @package    Rate_My_Post
 * @subpackage Rate_My_Post/admin/partials
 */
?>

<?php
  if ( ! defined( 'WPINC' ) ) {
  	die;
  }
?>

<?php
  $custom_string = get_option( 'rmp_customize_strings' );

  // Schema
  $post_id = get_the_id();
  $schema = get_post_meta( $post_id, '_rmp_schema_details', true );
  $schema_details = false;
  $schema_type = false;
  if( is_array( $schema ) ) {
    $schema_details = $schema['details'];
    $schema_type = $schema['type'];
  }
  $custom_class = get_post_meta( $post_id, '_rmp_post_class', true );

?>

<!-- Meta Box Customization Template-->

<div class="rmp-customize-mb js-rmp-customize-mb">

  <div class="rmp-customize-mb__notice">
    <p class="rmp-customize-mb__notice__text">
      <?php echo esc_html__( 'Here you can customize rating widget for this post and override the default settings!', 'rate-my-post'); ?>
    </p>
  </div>

  <div class="rmp-customize-mb__tabs">
    <div class="rmp-customize-mb__tabs__tab rmp-customize-mb__tabs__tab--selected js-rmp-customize-mb-tab" data-tab-class="js-rmp-customize-mb-schema-container">
      <?php echo esc_html__( 'Schema', 'rate-my-post'); ?>
    </div>
    <div class="rmp-customize-mb__tabs__tab js-rmp-customize-mb-tab" data-tab-class="js-rmp-customize-mb-strings-container">
      <?php echo esc_html__( 'Strings', 'rate-my-post'); ?>
    </div>
    <div class="rmp-customize-mb__tabs__tab js-rmp-customize-mb-tab" data-tab-class="js-rmp-customize-mb-style-container">
      <?php echo esc_html__( 'Style', 'rate-my-post'); ?>
    </div>
  </div>

  <div class="rmp-customize-mb__strings js-rmp-customize-mb-strings-container">
    <h3><?php echo esc_html__( 'Strings', 'rate-my-post'); ?></h3>

    <!-- String Fields -->
    <?php include_once plugin_dir_path( __FILE__ ) . 'partials/string-fields.php'; ?>

    <div class="rmp-customize-mb__strings__actions">
      <button type="button" class="rmp-btn rmp-btn--small js-rmp-mb-strings-btn">
        <?php echo ( esc_html__( 'Save Strings', 'rate-my-post' ) ); ?>
      </button>
      <p class="rmp-customize-mb__strings__msg js-rmp-strings-msg"></p>
    </div>

  </div>

  <div class="rmp-customize-mb__style js-rmp-customize-mb-style-container">
    <h3><?php echo esc_html__( 'Style', 'rate-my-post'); ?></h3>

    <div class="rmp-customize-mb__style__input-container">
      <label class="rmp-customize-mb__style__label" for="rmp-custom-class">
        <?php echo ( esc_html__( 'Add Custom Class', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__style__input js-rmp-class-input"
        id="rmp-custom-class"
        value="<?php echo ( esc_html( $custom_class ) ); ?>"
      >
    </div>

    <div class="rmp-customize-mb__style__actions">
      <button type="button" class="rmp-btn rmp-btn--small js-rmp-mb-style-btn">
        <?php echo ( esc_html__( 'Save Class', 'rate-my-post' ) ); ?>
      </button>
      <p class="rmp-customize-mb__style__msg js-rmp-style-msg"></p>
    </div>

  </div>

  <div class="rmp-customize-mb__schema rmp-customize-mb__schema--visible js-rmp-customize-mb-schema-container">
    <h3><?php echo esc_html__( 'Schema', 'rate-my-post'); ?></h3>

    <div class="rmp-customize-mb__schema__select-container">
      <label class="rmp-customize-mb__schema__label">
        <?php echo ( esc_html__( 'Schema Type', 'rate-my-post' ) ); ?>
      </label>
      <select class="rmp-customize-mb__schema__select js-rmp-schema-select">
        <option value="inherit" <?php echo(! $schema_type) ? 'selected' : ''; ?>>Inherit</option>
        <option value="Product" <?php echo($schema_type === 'Product') ? 'selected' : ''; ?>>Product</option>
        <option value="Book" <?php echo($schema_type === 'Book') ? 'selected' : ''; ?>>Book</option>
        <option value="Course" <?php echo($schema_type === 'Course') ? 'selected' : ''; ?>>Course</option>
        <option value="CreativeWorkSeason" <?php echo($schema_type === 'CreativeWorkSeason') ? 'selected' : ''; ?>>CreativeWorkSeason</option>
        <option value="CreativeWorkSeries" <?php echo($schema_type === 'CreativeWorkSeries') ? 'selected' : ''; ?>>CreativeWorkSeries</option>
        <option value="Episode" <?php echo($schema_type === 'Episode') ? 'selected' : ''; ?>>Episode</option>
        <option value="Game" <?php echo($schema_type === 'Game') ? 'selected' : ''; ?>>Game</option>
        <option value="LocalBusiness" <?php echo($schema_type === 'LocalBusiness') ? 'selected' : ''; ?>>LocalBusiness</option>
        <option value="MediaObject" <?php echo($schema_type === 'MediaObject') ? 'selected' : ''; ?>>MediaObject</option>
        <option value="Movie" <?php echo($schema_type === 'Movie') ? 'selected' : ''; ?>>Movie</option>
        <option value="MusicPlaylist" <?php echo($schema_type === 'MusicPlaylist') ? 'selected' : ''; ?>>MusicPlaylist</option>
        <option value="MusicRecording" <?php echo($schema_type === 'MusicRecording') ? 'selected' : ''; ?>>MusicRecording</option>
        <option value="Organization" <?php echo($schema_type === 'Organization') ? 'selected' : ''; ?>>Organization</option>
        <option value="Recipe" <?php echo($schema_type === 'Recipe') ? 'selected' : ''; ?>>Recipe</option>
        <option value="Event" <?php echo($schema_type === 'Event') ? 'selected' : ''; ?>>Event</option>
        <option value="softwareapplication" <?php echo($schema_type === 'softwareapplication') ? 'selected' : ''; ?>>SoftwareApplication</option>
      </select>
    </div>

    <!-- Schema Fields -->
    <?php include_once plugin_dir_path( __FILE__ ) . 'partials/meta-box-customization-schema-fields.php'; ?>

    <button type="button" class="rmp-btn rmp-btn--small js-rmp-mb-schema-btn">
      <?php echo ( esc_html__( 'Save Schema', 'rate-my-post' ) ); ?>
    </button>
    <p class="rmp-customize-mb__schema__msg js-rmp-mb-schema-msg"></p>

  </div>

</div>
