import "regenerator-runtime/runtime";

import AjaxRating from "./AjaxRating";
import FreezeWidget from './FreezeWidget';
import CookieCheck from './CookieCheck';
import PrivilegeCheck from './PrivilegeCheck';
import { RmpFrontend } from "./RmpFrontend";
import FeedbackWidget from './FeedbackWidget';

class InitWidget {
  constructor(postID) {
    console.debug("RMP: InitWidget constructor");
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

    this.ajaxRating = new AjaxRating(this.postID, this.widgetContainer, this.startTime);
  }

  events() {
    this.doubleWidgetCheck();
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

  doubleWidgetCheck() {
    let ratingWidgets = document.querySelectorAll(this.widgetContainer);
    let resultWidgets = document.querySelectorAll(this.resultsWidget);
    
    if( ratingWidgets.length > 1 || resultWidgets.length > 1 ) { // duplicates cause issues
      console.warn("RMP: duplicated DOM elements detected, code analysis required !");
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
      if( this.supportsHover && RmpFrontend.isRatingTooltipEnabled && this.ratingTextContainer) {
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
    const rating = parseInt(event.currentTarget.dataset.value, 10);

    this.ratingIcons.forEach((item, index) => {
      item.classList.remove('rmp-icon--processing-rating');

      if(index < rating) {
        item.classList.add('rmp-icon--processing-rating');
      }
    });

    // First we prevent accidental click
    if (RmpFrontend.isPreventAccidentalEnabled) {
      await this.submitButtonHandler();
    }
    
    // Second we check if forced feedback is enabled
    let feedbackText;
    if (RmpFrontend.isForcedFeedbackEnabled) {
      // const feedbackWidget = new FeedbackWidget(this.widgetContainer, this.postID, rating, undefined, undefined);
      const feedbackWidget = new FeedbackWidget(this.widgetContainer, this.postID, rating, undefined, undefined);
      await feedbackWidget.init()
        .then((value) => feedbackText = value);
    } 

    /** 
     * Finally we processing rating
     * Scenario 1: feedbackText is undefined so usual process requesting for feedback after vote enabled
     * Scenario 2: feedbackText is not null so we submit a rating with feedback to backend
     */ 
    let freezeWidget = new FreezeWidget(this.widgetContainer);
    this.ajaxRating.rate(rating, feedbackText);
  }

  async submitButtonHandler() {
    this.submitBtn.classList.add('rmp-rating-widget__submit-btn--visible');
    await new Promise((resolve, reject) => {
      this.submitBtn.addEventListener('click', () => resolve());
    });
  }

}

export default InitWidget;
