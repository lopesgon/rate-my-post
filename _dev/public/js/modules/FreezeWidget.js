import $ from 'jquery';

class FreezeWidget {
  constructor(widgetContainer) {
    this.widgetContainer = widgetContainer;
    this.ratingItems = $(this.widgetContainer + '.js-rmp-rating-item');
    this.ratingTextContainer = $(this.widgetContainer + '.js-rmp-hover-text');
    this.submitBtn = $(this.widgetContainer + '.js-submit-rating-btn');
    this.events();
  }

  events() {
    this.ratingItems.off();
    this.submitBtn.off();
    this.ratingItems.css('cursor', 'default');
    this.submitBtn.removeClass('rmp-rating-widget__submit-btn--visible');
    $(this.ratingTextContainer).text('');
  }
}

export default FreezeWidget;
