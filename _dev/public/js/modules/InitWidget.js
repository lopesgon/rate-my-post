import $ from 'jquery';
import AjaxRating from './AjaxRating';
import FreezeWidget from './FreezeWidget';
import CookieCheck from './CookieCheck';
import PrivilegeCheck from './PrivilegeCheck';
import {RmpFrontend} from './RmpFrontend';
import FeedbackWidget from './FeedbackWidget';
import saveRating from './RatingService';

class InitWidget {
  constructor(postID) {
    this.postID = postID;
    this.widgetContainer = '.js-rmp-widgets-container--' + postID + ' ';
    this.resultsWidget = '.js-rmp-results-widget--' + postID;
    this.ratingItems = $(this.widgetContainer + '.js-rmp-rating-item');
    this.ratingItemsList = $(this.widgetContainer + '.js-rmp-rating-icons-list');
    this.ratingIcons = $(this.widgetContainer + '.js-rmp-rating-icon');
    this.ratingTextContainer = $(this.widgetContainer + '.js-rmp-hover-text');
    this.ratingText = false;
    this.hoveredItemOrder = 0;
    this.rating = 0;
    this.supportsHover = window.matchMedia('(hover: hover)');
    this.startTime = Math.floor(Date.now() / 1000);
    this.submitBtn = $(this.widgetContainer + '.js-submit-rating-btn');
    this.saveRating = false;
    this.events();
  }

  events() {
    this.doubleWidgetCheck();
    this.ratingItems.css('cursor', 'pointer');
    this.ratingItems.on('mouseover', (event) => this.hoverIcons());
    this.ratingItems.on('mouseout', (event) => this.stopHoverIcons());
    this.ratingItemsList.on('mouseleave', (event) => this.removeHoverTexts());
    this.ratingItems.on('click', (event) => this.ratingIconClicked());
    let cookieCheck = new CookieCheck(this.widgetContainer, this.postID);
    let privilegeCheck = new PrivilegeCheck();
  }

  doubleWidgetCheck() {
    let ratingWidgets = $(this.widgetContainer);
    let resultWidgets = $(this.resultsWidget);
    if( ratingWidgets.length > 1 || resultWidgets.length > 1 ) { // duplicates cause issues
      $(ratingWidgets).each((index, item) => {
        if(index > 0) {
          $(item).remove();
        }
      });
      $(resultWidgets).each((index, item) => {
        if(index > 0) {
          $(item).remove();
        }
      });
    }
  }

  hoverIcons() {
    this.hoveredItemOrder = parseInt($(event.currentTarget).data('value'), 10);
    this.ratingText = $(event.currentTarget).attr('data-descriptive-rating');

    // highlight icons
    $(this.ratingIcons).each((index, item) => {
      if(index < this.hoveredItemOrder) {
        $(item).addClass('rmp-icon--hovered');
      } else {
        $(item).removeClass('rmp-icon--hovered');
      }
      // inject texts
      if( this.supportsHover && RmpFrontend.isRatingTooltipEnabled ) {
        $(this.ratingTextContainer).text(this.ratingText);
      }
    });

  }

  stopHoverIcons() {
    $(this.ratingIcons).removeClass('rmp-icon--hovered');
  }

  removeHoverTexts() {
    $(this.ratingTextContainer).text('');
  }

  async ratingIconClicked() {
    this.rating = parseInt($(event.currentTarget).data('value'), 10);
    this.ratingIcons.removeClass('rmp-icon--processing-rating');
    $(this.ratingIcons).each((index, item) => {
      if(index < this.rating) {
        $(item).addClass('rmp-icon--processing-rating');
      }
    });

    if(RmpFrontend.isPreventAccidentalEnabled) { // enabled
      await this.submitButtonHandler();
    }

    new FreezeWidget(this.widgetContainer);
    if (RmpFrontend.isForcedFeedbackEnabled) {
      // todo call AjaxRatingWithFeedback
      let feedbackWidget = new FeedbackWidget(this.widgetContainer, this.postID, this.rating, undefined, undefined);
      let feedbackText = await feedbackWidget.init();
      saveRating(this.postID, this.widgetContainer, this.rating, this.startTime, feedbackText);
    } else {
      // save rating
      this.saveRating = new AjaxRating(this.postID, this.widgetContainer, this.rating, this.startTime);
    }
  }

  async submitButtonHandler() {
    this.submitBtn.addClass('rmp-rating-widget__submit-btn--visible');
    return new Promise((resolve, reject) => {
      this.submitBtn.on('click', () => {
        if( !this.saveRating ) {
          resolve();
        }
      });
    });
  }

}

export default InitWidget;
