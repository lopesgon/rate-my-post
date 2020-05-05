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
?>

<!-- Meta Box Customization Template-->

<div class="rmp-customize-mb">

  <div class="rmp-customize-mb__notice">
    <p class="rmp-customize-mb__notice__text">
      <?php echo esc_html__( 'Here you can customize rating widget for this post and override the default settings!', 'rate-my-post'); ?>
    </p>
  </div>

  <div class="rmp-customize-mb__tabs">
    <div class="rmp-customize-mb__tabs__tab">
      <?php echo esc_html__( 'Strings', 'rate-my-post'); ?>
    </div>
    <div class="rmp-customize-mb__tabs__tab">
      <?php echo esc_html__( 'Style', 'rate-my-post'); ?>
    </div>
    <div class="rmp-customize-mb__tabs__tab">
      <?php echo esc_html__( 'Schema', 'rate-my-post'); ?>
    </div>
  </div>

  <div class="rmp-customize-mb__strings">
    <h3><?php echo esc_html__( 'Strings', 'rate-my-post'); ?></h3>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-title">
        <?php echo ( esc_html__( 'Rating Widget Title', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-title"
        placeholder="<?php echo $custom_string['rateTitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-subtitle">
        <?php echo ( esc_html__( 'Rating Widget Subtitle', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-subtitle"
        placeholder="<?php echo $custom_string['rateSubtitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-results">
        <?php echo ( esc_html__( 'Custom Results Text', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-results"
        placeholder="<?php echo ( esc_html__( 'Inherit from settings', 'rate-my-post' ) ); ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-no-votes">
        <?php echo ( esc_html__( 'Text if no votes', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-no-votes"
        placeholder="<?php echo $custom_string['noRating']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-success">
        <?php echo ( esc_html__( 'Rating Success', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-success"
        placeholder="<?php echo $custom_string['afterVote']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-one-star">
        <?php echo ( esc_html__( 'One-Star Hover', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-one-star"
        placeholder="<?php echo $custom_string['star1']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-two-star">
        <?php echo ( esc_html__( 'Two-Star Hover', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-two-star"
        placeholder="<?php echo $custom_string['star2']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-three-star">
        <?php echo ( esc_html__( 'Three-Star Hover', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-three-star"
        placeholder="<?php echo $custom_string['star3']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-four-star">
        <?php echo ( esc_html__( 'Four-Star Hover', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-four-star"
        placeholder="<?php echo $custom_string['star4']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-five-star">
        <?php echo ( esc_html__( 'Five-Star Hover', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-five-star"
        placeholder="<?php echo $custom_string['star5']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-social-title">
        <?php echo ( esc_html__( 'Social Widget Title', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-social-title"
        placeholder="<?php echo $custom_string['socialTitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-social-subtitle">
        <?php echo ( esc_html__( 'Social Widget Subtitle', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-social-subtitle"
        placeholder="<?php echo $custom_string['socialSubtitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-custom-feedback-title">
        <?php echo ( esc_html__( 'Feedback Widget Title', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-custom-feedback-title"
        placeholder="<?php echo $custom_string['feedbackTitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-feedback-subtitle">
        <?php echo ( esc_html__( 'Feedback Widget Subtitle', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-feedback-subtitle"
        placeholder="<?php echo $custom_string['feedbackSubtitle']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-feedback-text">
        <?php echo ( esc_html__( 'Feedback Widget Text', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-feedback-text"
        placeholder="<?php echo $custom_string['feedbackText']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-feedback-success">
        <?php echo ( esc_html__( 'Feedback Widget Success Text', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-feedback-success"
        placeholder="<?php echo $custom_string['feedbackNotice']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-feedback-btn">
        <?php echo ( esc_html__( 'Feedback Widget Button', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-feedback-btn"
        placeholder="<?php echo $custom_string['feedbackButton']; ?>"
      >
    </div>

    <div class="rmp-customize-mb__strings__input-container">
      <label class="rmp-customize-mb__strings__label" for="rmp-empty-feedback">
        <?php echo ( esc_html__( 'Empty Feedback Text', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__strings__input"
        id="rmp-empty-feedback"
        placeholder="<?php echo $custom_string['feedbackAlert']; ?>"
      >
    </div>

  </div>

  <div class="rmp-customize-mb__style">
    <h3><?php echo esc_html__( 'Style', 'rate-my-post'); ?></h3>

    <div class="rmp-customize-mb__style__input-container">
      <label class="rmp-customize-mb__style__label" for="rmp-custom-class">
        <?php echo ( esc_html__( 'Add Custom Class', 'rate-my-post' ) ); ?>
      </label>
      <input
        type="text"
        class="rmp-customize-mb__style__input"
        id="rmp-custom-class"
      >
    </div>

  </div>

  <div class="rmp-customize-mb__schema">
    <h3><?php echo esc_html__( 'Schema', 'rate-my-post'); ?></h3>

    <div class="rmp-customize-mb__schema__select-container">
      <label class="rmp-customize-mb__schema__label">
        <?php echo ( esc_html__( 'Schema Type', 'rate-my-post' ) ); ?>
      </label>
      <select class="rmp-customize-mb__schema__select js-rmp-schema-select">
        <option value="inherit">Inherit</option>
        <option value="Product">Product</option>
        <option value="Book">Book</option>
        <option value="Course">Course</option>
        <option value="CreativeWorkSeason">CreativeWorkSeason</option>
        <option value="CreativeWorkSeries">CreativeWorkSeries</option>
        <option value="Episode">Episode</option>
        <option value="Game">Game</option>
        <option value="LocalBusiness">LocalBusiness</option>
        <option value="MediaObject">MediaObject</option>
        <option value="Movie">Movie</option>
        <option value="MusicPlaylist">MusicPlaylist</option>
        <option value="MusicRecording">MusicRecording</option>
        <option value="Organization">Organization</option>
        <option value="Recipe">Recipe</option>
        <option value="Event">Event</option>
        <option value="softwareapplication">SoftwareApplication</option>
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
