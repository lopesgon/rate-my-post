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

<?php
  $specific_strings = get_post_meta( get_the_id(), '_rmp_post_strings', true );
  if( !$specific_strings ) {
    $specific_strings = array();
  }
  $options = get_option( 'rmp_options' );

  $crw = false;
  if( get_post_type() === 'crw') {
    $crw = true;
  }
?>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-title">
    <?php echo ( esc_html__( 'Rating Widget Title', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="rateTitle"
    id="rmp-custom-title"
    placeholder="<?php echo esc_html( $custom_string['rateTitle'] ); ?>"
    value="<?php echo (array_key_exists('rateTitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['rateTitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-subtitle">
    <?php echo ( esc_html__( 'Rating Widget Subtitle', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="rateSubtitle"
    id="rmp-custom-subtitle"
    placeholder="<?php echo esc_html( $custom_string['rateSubtitle'] ); ?>"
    value="<?php echo (array_key_exists('rateSubtitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['rateSubtitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-results">
    <?php echo ( esc_html__( 'Custom Results Text', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="customResultsText"
    id="rmp-custom-results"
    placeholder="<?php echo ($custom_string['customResultsText']) ? esc_html( $custom_string['customResultsText'] ) : esc_html__('Custom results text is not used', 'rate-my-post'); ?>"
    value="<?php echo (array_key_exists('customResultsText', $specific_strings)) ? stripslashes( esc_html( $specific_strings['customResultsText'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<?php if( ! $crw ): ?>
<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-no-votes">
    <?php echo ( esc_html__( 'Text if no votes', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="noRating"
    id="rmp-custom-no-votes"
    placeholder="<?php echo esc_html( $custom_string['noRating'] ); ?>"
    value="<?php echo (array_key_exists('noRating', $specific_strings)) ? stripslashes( esc_html( $specific_strings['noRating'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>
<?php endif; ?>

<?php if( ! $crw ): ?>
<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-success">
    <?php echo ( esc_html__( 'Rating Success', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="afterVote"
    id="rmp-custom-success"
    placeholder="<?php echo esc_html( $custom_string['afterVote'] ); ?>"
    value="<?php echo (array_key_exists('afterVote', $specific_strings)) ? stripslashes( esc_html( $specific_strings['afterVote'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>
<?php endif; ?>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-one-star">
    <?php echo ( esc_html__( 'One-Star Hover', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="star1"
    id="rmp-custom-one-star"
    placeholder="<?php echo esc_html( $custom_string['star1'] ); ?>"
    value="<?php echo (array_key_exists('star1', $specific_strings)) ? stripslashes( esc_html( $specific_strings['star1'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-two-star">
    <?php echo ( esc_html__( 'Two-Star Hover', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="star2"
    id="rmp-custom-two-star"
    placeholder="<?php echo esc_html( $custom_string['star2'] ); ?>"
    value="<?php echo (array_key_exists('star2', $specific_strings)) ? stripslashes( esc_html( $specific_strings['star2'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-three-star">
    <?php echo ( esc_html__( 'Three-Star Hover', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="star3"
    id="rmp-custom-three-star"
    placeholder="<?php echo esc_html( $custom_string['star3'] ); ?>"
    value="<?php echo (array_key_exists('star3', $specific_strings)) ? stripslashes( esc_html( $specific_strings['star3'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-four-star">
    <?php echo ( esc_html__( 'Four-Star Hover', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="star4"
    id="rmp-custom-four-star"
    placeholder="<?php echo esc_html( $custom_string['star4'] ); ?>"
    value="<?php echo (array_key_exists('star4', $specific_strings)) ? stripslashes( esc_html( $specific_strings['star4'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-five-star">
    <?php echo ( esc_html__( 'Five-Star Hover', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="star5"
    id="rmp-custom-five-star"
    placeholder="<?php echo esc_html( $custom_string['star5'] ); ?>"
    value="<?php echo (array_key_exists('star5', $specific_strings)) ? stripslashes( esc_html( $specific_strings['star5'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-social-title">
    <?php echo ( esc_html__( 'Social Widget Title', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="socialTitle"
    id="rmp-custom-social-title"
    placeholder="<?php echo esc_html( $custom_string['socialTitle'] ); ?>"
    value="<?php echo (array_key_exists('socialTitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['socialTitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-social-subtitle">
    <?php echo ( esc_html__( 'Social Widget Subtitle', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="socialSubtitle"
    id="rmp-custom-social-subtitle"
    placeholder="<?php echo esc_html( $custom_string['socialSubtitle'] ); ?>"
    value="<?php echo (array_key_exists('socialSubtitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['socialSubtitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-custom-feedback-title">
    <?php echo ( esc_html__( 'Feedback Widget Title', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackTitle"
    id="rmp-custom-feedback-title"
    placeholder="<?php echo esc_html( $custom_string['feedbackTitle'] ); ?>"
    value="<?php echo (array_key_exists('feedbackTitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackTitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-feedback-subtitle">
    <?php echo ( esc_html__( 'Feedback Widget Subtitle', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackSubtitle"
    id="rmp-feedback-subtitle"
    placeholder="<?php echo esc_html( $custom_string['feedbackSubtitle'] ); ?>"
    value="<?php echo (array_key_exists('feedbackSubtitle', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackSubtitle'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-feedback-text">
    <?php echo ( esc_html__( 'Feedback Widget Text', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackText"
    id="rmp-feedback-text"
    placeholder="<?php echo esc_html( $custom_string['feedbackText'] ); ?>"
    value="<?php echo (array_key_exists('feedbackText', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackText'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-feedback-success">
    <?php echo ( esc_html__( 'Feedback Widget Success Text', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackNotice"
    id="rmp-feedback-success"
    placeholder="<?php echo esc_html( $custom_string['feedbackNotice'] ); ?>"
    value="<?php echo (array_key_exists('feedbackNotice', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackNotice'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-feedback-btn">
    <?php echo ( esc_html__( 'Feedback Widget Button', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackButton"
    id="rmp-feedback-btn"
    placeholder="<?php echo esc_html( $custom_string['feedbackButton'] ); ?>"
    value="<?php echo (array_key_exists('feedbackButton', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackButton'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>

<?php if( ! $crw ): ?>
<div class="rmp-customize-mb__strings__input-container">
  <label class="rmp-customize-mb__strings__label" for="rmp-empty-feedback">
    <?php echo ( esc_html__( 'Empty Feedback Text', 'rate-my-post' ) ); ?>
  </label>
  <input
    type="text"
    class="rmp-customize-mb__strings__input js-rmp-custom-string"
    data-custom-string-key="feedbackAlert"
    id="rmp-empty-feedback"
    placeholder="<?php echo esc_html( $custom_string['feedbackAlert'] ); ?>"
    value="<?php echo (array_key_exists('feedbackAlert', $specific_strings)) ? stripslashes( esc_html( $specific_strings['feedbackAlert'] ) ) : ''; ?>"
    <?php echo ( $options['multiLingual'] == 2 ) ? 'disabled': ''; ?>
  >
</div>
<?php endif; ?>
