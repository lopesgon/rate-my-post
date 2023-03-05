import "regenerator-runtime/runtime";

import AjaxFeedback from './AjaxFeedback';
import FeedbackSubmitted from './FeedbackSubmitted';
import {RmpFrontend} from "./RmpFrontend";

/**
 * Class Component
 * Singleton pattern
 * 
 * Only one instance of FeedbackWidget must be shared accross existing thread.
 * This will allow widget to store its context and state through its lifetime.
 * 
 * WARN: multiple calls to constructor won't create new instance.
 * This could be confusing.. we recommend the usage of getInstance() static method.
 */
class FeedbackWidget {
  constructor(widgetContainer, postID, rating, token, ratingID) {
    if (!FeedbackWidget._instance) {
      console.debug("RMP: FeedbackWidget constructor");
      this.widgetContainer = widgetContainer;
      this.postID = postID;
      this.rating = rating;

      // DOM Elements
      this.msgContainer = document.querySelector(this.widgetContainer + '.js-rmp-feedback-msg');
      this.ratingWidget = document.querySelector(this.widgetContainer + '.js-rmp-rating-widget');
      this.feedbackWidget = document.querySelector(this.widgetContainer + '.js-rmp-feedback-widget');
      this.inputContainer = document.querySelector(this.widgetContainer + '.js-rmp-feedback-input');
      this.submitButton = document.querySelector(this.widgetContainer + '.js-rmp-feedback-button');
      this.loader = document.querySelector(this.widgetContainer + '.js-rmp-feedback-loader');

      // Optional constructor parameters
      // Case these attributes are undefined means the feature forced_feedback is enabled
      this.token = token;
      this.ratingID = ratingID;

      // Feedback component state
      this.alreadySubmitted = false;

      // instanciate singleton instance attribute
      FeedbackWidget._instance = this;
    }

    return FeedbackWidget._instance;
  }

  static getInstance() {
    if (!this._instance) {
      console.error("RMP: call to get instance without previous instanciation");
      return;
    }
    return this._instance;
  }

  async init() {
    if (this.alreadySubmitted) {
      console.debug("RMP: feedback already submitted");
      return;
    }

    if (RmpFrontend.isNegativeRating(this.rating) && (RmpFrontend.isFeedbackEnabled || RmpFrontend.isForcedFeedbackEnabled)) {
      this.mountComponents();
      return new Promise((resolve, reject) => {
        this.submitButton.addEventListener('click', () => {
          const feedbackText = this.submitButtonClicked();
            if (feedbackText) {
              this.alreadySubmitted = true;
              this.unmountComponents();
              resolve(feedbackText);
            };
        });
      });
    }
    return;
  }

   submitButtonClicked() {
      const feedbackInput = this.inputContainer.value;
      if (feedbackInput.trim().length < 1 ) { // feedback was not inserted
        this.msgContainer.classList.add('rmp-feedback-widget__msg--alert');
        this.msgContainer.textContent = RmpFrontend.getEmptyFeedbackText;
        return undefined;
      }
      this.enableSubmitComponents();
  
      // if those values are not undefined then its simple feedback case
      if (this.token && this.postID) {
        console.debug("Submitting feedback");
        new AjaxFeedback(this.widgetContainer, this.postID, feedbackInput, this.token, this.ratingID);
        // await AjaxFeedback.submit()
      } else {
        return feedbackInput;
      }
  }

  async saveFeedback() {
    const formData = new FormData();
    Object.keys(this.data).forEach(key => formData.append(key, this.data[key]));

    await fetch(this.settings.admin_ajax, {
      method: "POST",
      body: formData
    }).then((response) => {
      new FeedbackSubmitted(this.widgetContainer, response);
    });
  }

  mountComponents() {
    this.feedbackWidget.classList.add('rmp-feedback-widget--visible');
    this.ratingWidget.classList.add('rmp-rating-widget--hidden');
  }

  enableSubmitComponents() {
    this.submitButton.replaceWith(this.submitButton.cloneNode(true));
    this.submitButton = document.querySelector(this.widgetContainer + '.js-rmp-feedback-button');
    this.loader.classList.add('rmp-feedback-widget__loader--visible')
  }

  unmountComponents(response) {
    this.loader.classList.remove('rmp-feedback-widget__loader--visible');

    if (response) {
      if( this.errorMsg.length ) {
        this.msgContainer.classList.add('rmp-feedback-widget__msg--alert');
        this.msgContainer.innerHTML(response.errorMsg.join('<br />'));
        return;
      }
      this.msgContainer.textContent(response.successMsg);
    }
    this.msgContainer.classList.remove('rmp-feedback-widget__msg--alert');
    
    this.inputContainer.remove();
    this.submitButton.remove();
  }
}

export default FeedbackWidget;
