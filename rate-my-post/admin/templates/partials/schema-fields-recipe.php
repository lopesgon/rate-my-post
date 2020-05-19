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
  $recipe = false;
  if( $schema_type === 'Recipe' ) {
    $recipe = true;
  };
?>

<div class="rmp-customize-mb__schema__schema-field js-rmp-schema-type js-rmp-schema-recipe <?php echo ($recipe) ? 'rmp-customize-mb__schema__schema-field--selected' : ''; ?>">
  <h3>Recipe</h3>
  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="cookTime">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Cook Time', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('cookTime', $schema_details) ) ? $schema_details['cookTime'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The time it takes to actually cook the dish, in %s duration format. For example %s for 1 hour and 15 minutes.', 'rate-my-post'), 'ISO 8601', 'P1H15M' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="keywords">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Keywords', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('keywords', $schema_details) ) ? $schema_details['keywords'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('Keywords or tags used to describe this content, separated by comma', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="prepTime">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Preparation Time', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('prepTime', $schema_details) ) ? $schema_details['prepTime'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
          <?php echo sprintf( esc_html__('The length of time it takes to prepare the items to be used in instructions, in %s duration format. For example %s for 1 hour and 15 minutes.', 'rate-my-post'), 'ISO 8601', 'P1H15M' ); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeCategory">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Recipe Category', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('recipeCategory', $schema_details) ) ? $schema_details['recipeCategory'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('The category of the recipe—for example, appetizer, entree, etc', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeCuisine">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Recipe Cuisine', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('recipeCuisine', $schema_details) ) ? $schema_details['recipeCuisine'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('The cuisine of the recipe (for example, French or Ethiopian)', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="recipeInstructions">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Recipe Instructions', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('recipeInstructions', $schema_details) ) ? $schema_details['recipeInstructions'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('A short description how to prepare the dish', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input js-rmp-schema-field" data-schema-key="video">
    <label class="rmp-schema-input__label">
      <?php echo ( esc_html__( 'Video', 'rate-my-post' ) ); ?>
    </label>
    <input
      type="text"
      class="rmp-schema-input__input"
      value="<?php echo ( $recipe && array_key_exists('video', $schema_details) ) ? $schema_details['video'] : ''; ?>"
    >
    <div class="rmp-schema-input__tip">
      <p class="rmp-schema-input__tip__text">
        <?php echo esc_html__('Link to video', 'rate-my-post'); ?>.
      </p>
    </div>
  </div>

  <div class="rmp-schema-input rmp-schema-input--series js-rmp-schema-complex" data-schema-key-has-children="nutrition">
    <?php if( $recipe && array_key_exists('nutrition', $schema_details) && !empty($schema_details['nutrition']) ): ?>
      <?php foreach( $schema_details['nutrition'] as $nutrition ): ?>
        <div class="rmp-schema-input__single-repeater js-rmp-single-from-complex">
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="calories" data-schema-key-parent="nutrition">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Nutrition - Calories', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $recipe && array_key_exists('calories', $nutrition) ) ? $nutrition['calories'] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                <?php echo esc_html__('The number of calories', 'rate-my-post'); ?>.
              </p>
            </div>
          </div>
        </div>
      <?php endforeach;  ?>
    <?php else:  ?>
    <div class="rmp-schema-input__single-repeater js-rmp-single-from-complex">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key="calories" data-schema-key-parent="nutrition">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Nutrition - Calories', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
            <?php echo esc_html__('The number of calories', 'rate-my-post'); ?>.
          </p>
        </div>
      </div>
    </div>
    <?php endif;  ?>
  </div>

  <div class="rmp-schema-multiple-container js-rmp-schema-complex" data-schema-key-has-children="recipeIngredient">
    <?php if( $recipe && array_key_exists('recipeIngredient', $schema_details) && !empty($schema_details['recipeIngredient']) ): ?>
      <?php foreach( $schema_details['recipeIngredient'] as $recipeIngredient ): ?>
        <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex" data-schema-structure="array">
          <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key-parent="false">
            <label class="rmp-schema-input__label">
              <?php echo ( esc_html__( 'Recipe Ingredient', 'rate-my-post' ) ); ?>
            </label>
            <input
              type="text"
              class="rmp-schema-input__input"
              value="<?php echo ( $recipe && array_key_exists('0', $recipeIngredient) ) ? $recipeIngredient[0] : ''; ?>"
            >
            <div class="rmp-schema-input__tip">
              <p class="rmp-schema-input__tip__text">
                <?php echo esc_html__('A single ingredient used in the recipe. For example sugar, flour or garlic', 'rate-my-post'); ?>.
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
    <div class="rmp-schema-multiple-container__series js-rmp-single-from-complex" data-schema-structure="array">
      <div class="rmp-schema-input rmp-schema-input--child js-rmp-schema-field" data-schema-key-parent="false">
        <label class="rmp-schema-input__label">
          <?php echo ( esc_html__( 'Recipe Ingredient', 'rate-my-post' ) ); ?>
        </label>
        <input
          type="text"
          class="rmp-schema-input__input"
        >
        <div class="rmp-schema-input__tip">
          <p class="rmp-schema-input__tip__text">
            <?php echo esc_html__('A single ingredient used in the recipe. For example sugar, flour or garlic', 'rate-my-post'); ?>.
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
