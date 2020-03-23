import $ from 'jquery';

class DestroyWidgets {
  constructor() {
    this.ratingItems = $('.js-rmp-rating-item');
    this.ratingItemsLists = $('.js-rmp-rating-icons-list');
    this.events();
  }

  events() {
    this.ratingItems.css('cursor', 'auto');
    this.ratingItems.off();
    this.ratingItemsLists.off();
  }

}

export default DestroyWidgets;
