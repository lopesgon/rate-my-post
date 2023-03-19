import AjaxRating from './AjaxRating';
import FreezeWidget from './FreezeWidget';
import CookieCheck from './CookieCheck';
import PrivilegeCheck from './PrivilegeCheck';
import {RmpFrontend} from './RmpFrontend';
import FeedbackWidget from './FeedbackWidget';
import saveRating from './RatingService';
import ResultsWidget from './ResultsWidget';

class InitWidget {
  constructor(postID) {
    this.postID = postID;
    this.widgetContainer = '.js-rmp-widgets-container--' + postID + ' ';
    this.resultsWidget = '.js-rmp-results-widget--' + postID;
    this.ratingItems = document.querySelectorAll(this.widgetContainer + '.js-rmp-rating-item');
    this.ratingItemsList = document.querySelector(this.widgetContainer + '.js-rmp-rating-icons-list');
    this.ratingIcons = document.querySelectorAll(this.widgetContainer + '.js-rmp-rating-icon');
    this.ratingTextContainer = document.querySelector(this.widgetContainer + '.js-rmp-hover-text');
    this.ratingText = false;
    this.hoveredItemOrder = 0;
    this.rating = 0;
    this.supportsHover = window.matchMedia('(hover: hover)');
    this.startTime = Math.floor(Date.now() / 1000);
    this.submitBtn = document.querySelector(this.widgetContainer + '.js-submit-rating-btn');
    this.saveRating = false;
    this.events();
  }

  events() {
    this.widgetsSanitization();
    this.ratingItems.forEach((item) => {
      item.style.cursor = 'pointer';
      item.addEventListener('mouseover', (event) => this.hoverIcons(event));
      item.addEventListener('mouseout', (event) => this.stopHoverIcons());
      item.addEventListener('click', (event) => this.ratingIconClicked(event));
    });
    this.ratingItemsList.addEventListener('mouseleave', (event) => this.removeHoverTexts());
    let cookieCheck = new CookieCheck(this.widgetContainer, this.postID);
    let privilegeCheck = new PrivilegeCheck();
  }

  widgetsSanitization() {
    let ratingWidgets = document.querySelectorAll(this.widgetContainer);
    let resultWidgets = document.querySelectorAll(this.resultsWidget);
    if( ratingWidgets.length > 1 || resultWidgets.length > 1 ) { // duplicates cause issues
      ratingWidgets.forEach((item, index) => {
        if(index > 0) {
          item.remove();
        }
      });
      resultWidgets.forEach((item, index) => {
        if(index > 0) {
          item.remove();
        }
      });
    }

    // initialize widget singletons
    new ResultsWidget(this.postID);
  }

  hoverIcons(event) {
    this.hoveredItemOrder = parseInt(event.currentTarget.dataset.value, 10);
    this.ratingText = event.currentTarget.dataset.descriptiveRating;

    // highlight icons
    this.ratingIcons.forEach((item, index) => {
      if(index < this.hoveredItemOrder) {
        item.classList.add('rmp-icon--hovered');
      } else {
        item.classList.remove('rmp-icon--hovered');
      }
      // inject texts
      if( this.supportsHover && RmpFrontend.isRatingTooltipEnabled && this.ratingTextContainer ) {
        this.ratingTextContainer.textContent = this.ratingText;
      }
    });

  }

  stopHoverIcons() {
    this.ratingIcons.forEach((item) => {
      item.classList.remove('rmp-icon--hovered');
    });
  }

  removeHoverTexts() {
    if(this.ratingTextContainer) {
      this.ratingTextContainer.textContent = '';
    }
  }

  async ratingIconClicked(event) {
    this.rating = parseInt(event.currentTarget.dataset.value, 10);
    this.ratingIcons.forEach((item, index) => {
      item.classList.remove('rmp-icon--processing-rating');
      if(index < this.rating) {
        item.classList.add('rmp-icon--processing-rating');
      }
    });

    if(RmpFrontend.isPreventAccidentalEnabled) { // enabled
      await this.submitButtonHandler();
    }

    new FreezeWidget(this.widgetContainer);
    if (RmpFrontend.isForcedFeedbackEnabled) {
      let feedbackWidget = new FeedbackWidget(this.widgetContainer, this.postID, this.rating, undefined, undefined);
      let feedbackText = await feedbackWidget.init();
      saveRating(this.postID, this.widgetContainer, this.rating, this.startTime, feedbackText);
    } else {
      // save rating
      this.saveRating = new AjaxRating(this.postID, this.widgetContainer, this.rating, this.startTime);
    }
  }

  submitButtonHandler() {
    this.submitBtn.classList.add('rmp-rating-widget__submit-btn--visible');
    return new Promise((resolve, reject) => {
      this.submitBtn.addEventListener('click', () => {
        if( !this.saveRating ) {
          resolve();
        }
      });
    });
  }

}

export default InitWidget;
