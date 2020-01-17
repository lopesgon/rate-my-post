import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import Cookies from 'js-cookie'
import FreezeWidget from './FreezeWidget';

class CookieCheck {
  constructor(widgetContainer, postID) {
    this.postID = postID;
    this.widgetContainer = widgetContainer;
    this.existingCookie = Cookies.get('rmp-rate');
    this.cookiesDisabled = rmp_frontend.cookieDisable;
    this.tnxMsg = rmp_frontend.afterVote;
    this.msgContainer = $(this.widgetContainer + '.js-rmp-msg');
    this.ratingWidget = $(this.widgetContainer + '.js-rmp-rating-widget');
    this.events();
  }

  events() {
    if(this.cookiesDisabled == 2) {
      return;
    }

    if(typeof this.existingCookie === 'undefined') {
      return;
    }

    let postsArray = this.existingCookie.split(',');
    //console.log(jQuery.inArray(this.postID, postsArray));
    // if(!postsArray.includes(this.postID)) { // requires polyfill
    if(jQuery.inArray(this.postID, postsArray) === -1) {
      return;
    }

    let freezeWidget = new FreezeWidget(this.widgetContainer);
    this.msgContainer.text(this.tnxMsg);
    this.ratingWidget.addClass('rmp-rating-widget--has-rated')

  }


}

export default CookieCheck;
