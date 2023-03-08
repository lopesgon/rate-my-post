import AjaxFeedback from './AjaxFeedback';
import { RmpFrontend } from './RmpFrontend';

class FeedbackWidget {
  constructor(widgetContainer, postID, rating, token, ratingID) {
    if (!FeedbackWidget._instance) {
      this.widgetContainer = widgetContainer;
      this.postID = postID;

      this.msgContainer = document.querySelector(this.widgetContainer + '.js-rmp-feedback-msg');
      this.rating = rating;
      this.ratingWidget = document.querySelector(this.widgetContainer + '.js-rmp-rating-widget');
      this.feedbackWidget = document.querySelector(this.widgetContainer + '.js-rmp-feedback-widget');
      this.inputContainer = document.querySelector(this.widgetContainer + '.js-rmp-feedback-input');
      this.submitButton = document.querySelector(this.widgetContainer + '.js-rmp-feedback-button');
      this.loader = document.querySelector(this.widgetContainer + '.js-rmp-feedback-loader');
      this.input = false;
      this.token = token;
      this.ratingID = ratingID;
      this.alreadySubmitted = false;

      FeedbackWidget._instance = this;
    }

    return FeedbackWidget._instance;
  }

  async init() {
    if( this.alreadySubmitted || 
        (!RmpFrontend.isFeedbackEnabled || !RmpFrontend.isForcedFeedbackEnabled) && !RmpFrontend.isNegativeRating(this.rating)) {
      return;
    }

    this.feedbackWidget.classList.add('rmp-feedback-widget--visible');
    this.ratingWidget.classList.add('rmp-rating-widget--hidden');

    let feedbackText = await this.submitButtonHandler();

    if (RmpFrontend.isForcedFeedbackEnabled) {
      this.alreadySubmitted = true;
      return feedbackText;
    } else {
      this.alreadySubmitted = true;
      this.loader.classList.add('rmp-feedback-widget__loader--visible');
      let saveFeedback = new AjaxFeedback(this.widgetContainer, this.postID, feedbackText, this.token, this.ratingID);
    }
  }

  async submitButtonHandler() {
    return new Promise((resolve, reject) => {
      this.submitButton.addEventListener('click', () => {
        let feedbackText = this.inputContainer.value;
        if(feedbackText.trim().length < 1 ) { // feedback was not inserted
          this.msgContainer.classList.add('rmp-feedback-widget__msg--alert');
          this.msgContainer.textContent = RmpFrontend.getEmptyFeedbackText;
          return;
        }
        this.submitButton.replaceWith(this.submitButton.cloneNode(true));
        this.submitButton = document.querySelector(this.widgetContainer + '.js-rmp-feedback-button');
        resolve(feedbackText);
      });
    });
  }

}

export default FeedbackWidget;
