import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';

class SocialWidget {
  constructor(widgetContainer, rating) {
    this.widgetContainer = widgetContainer;
    this.socialEnabled = rmp_frontend.social;
    this.ratingRequired = rmp_frontend.positiveThreshold;
    this.rating = rating;
    this.ratingWidget = $(this.widgetContainer + '.js-rmp-rating-widget');
    this.socialWidget = $(this.widgetContainer + '.js-rmp-social-widget');
    this.events();
  }

  events() {
    if(this.socialEnabled != 2 || this.rating <= this.ratingRequired) {
      return;
    }
    this.socialWidget.addClass('rmp-social-widget--visible');
    this.ratingWidget.addClass('rmp-rating-widget--hidden');
  }

}

export default SocialWidget;
