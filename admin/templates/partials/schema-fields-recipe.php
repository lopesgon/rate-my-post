<?php

/**
 * Meta box schema fields for recipe type
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

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-recipe">
  <h3>Recipe</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="cookTime">
    <label class="rmp-schema-input__label" for="rmp-schema-cookTime">
      <?php echo ( esc_html__( 'Cook Time', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-cookTime"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The time it takes to actually cook the dish, in %s duration format. For example %s for 1 hour and 15 minutes.', 'rate-my-post'), 'ISO 8601', 'P1H15M' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="keywords">
    <label class="rmp-schema-input__label" for="rmp-schema-keywords">
      <?php echo ( esc_html__( 'Keywords', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-keywords"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('Keywords or tags used to describe this content, separated by comma', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="prepTime">
    <label class="rmp-schema-input__label" for="rmp-schema-prepTime">
      <?php echo ( esc_html__( 'Preparation Time', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-prepTime"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The length of time it takes to prepare the items to be used in instructions, in %s duration format. For example %s for 1 hour and 15 minutes.', 'rate-my-post'), 'ISO 8601', 'P1H15M' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeCategory">
    <label class="rmp-schema-input__label" for="rmp-schema-recipeCategory">
      <?php echo ( esc_html__( 'Recipe Category', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-recipeCategory"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('The category of the recipe—for example, appetizer, entree, etc', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeCuisine">
    <label class="rmp-schema-input__label" for="rmp-schema-recipeCuisine">
      <?php echo ( esc_html__( 'Recipe Cuisine', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-recipeCuisine"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('The cuisine of the recipe (for example, French or Ethiopian)', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeInstructions">
    <label class="rmp-schema-input__label" for="rmp-schema-recipeInstructions">
      <?php echo ( esc_html__( 'Recipe Instructions', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-recipeInstructions"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('A short description how to prepare the dish', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="video">
    <label class="rmp-schema-input__label" for="rmp-schema-video">
      <?php echo ( esc_html__( 'Video', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      id="rmp-schema-video"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('Link to video', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input rmp-schema-input--series js-rmp-schema-repeater" data-schema-key-repeater="nutrition">
    <div class="rmp-schema-input__single-repeater js-rmp-single-from-repeater">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="calories" data-schema-key-parent="nutrition">
        <label class="rmp-schema-input__label" for="rmp-schema-calories">
          <?php echo ( esc_html__( 'Nutrition - Calories', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-calories"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
            <?php echo esc_html__('The number of calories', 'rate-my-post'); ?>.
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="rmp-schema-input rmp-schema-input--series js-rmp-schema-repeater" data-schema-key-repeater="recipeIngredient">
    <div class="rmp-schema-input__single-repeater js-rmp-single-from-repeater" data-schema-structure="array">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field">
        <label class="rmp-schema-input__label" for="rmp-schema-recipeIngredient">
          <?php echo ( esc_html__( 'Recipe Ingredient', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
          id="rmp-schema-recipeIngredient"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
            <?php echo esc_html__('A single ingredient used in the recipe. For example sugar, flour or garlic', 'rate-my-post'); ?>.
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
