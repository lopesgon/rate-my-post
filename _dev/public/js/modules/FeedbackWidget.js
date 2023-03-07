import $ from 'jquery';
import AjaxFeedback from './AjaxFeedback';
import { RmpFrontend } from './RmpFrontend';

class FeedbackWidget {
  constructor(widgetContainer, postID, rating, token, ratingID) {
    if(!RmpFrontend.isFeedbackEnabled || !RmpFrontend.isForcedFeedbackEnabled || !RmpFrontend.isNegativeRating(rating)) {
      return;
    }

    this.widgetContainer = widgetContainer;
    this.postID = postID;
    this.msgContainer = $(this.widgetContainer + '.js-rmp-feedback-msg');
    this.ratingWidget = $(this.widgetContainer + '.js-rmp-rating-widget');
    this.feedbackWidget = $(this.widgetContainer + '.js-rmp-feedback-widget');
    this.inputContainer = $(this.widgetContainer + '.js-rmp-feedback-input');
    this.submitButton = $(this.widgetContainer + '.js-rmp-feedback-button');
    this.loader = $(this.widgetContainer + '.js-rmp-feedback-loader');
    this.input = false;
    this.token = token;
    this.ratingID = ratingID;
  }

  async init() {
    this.feedbackWidget.addClass('rmp-feedback-widget--visible');
    this.ratingWidget.addClass('rmp-rating-widget--hidden');
    
    let feedbackText = await this.submitButtonHandler();

    if (RmpFrontend.isForcedFeedbackEnabled) {
      return feedbackText;
    } else {
      this.loader.addClass('rmp-feedback-widget__loader--visible')
      let saveFeedback = new AjaxFeedback(this.widgetContainer, this.postID, feedbackText, this.token, this.ratingID);
    }
  }

  async submitButtonHandler() {
    return new Promise((resolve, reject) => {
      this.submitButton.on('click', () => {
        let feedbackText = $(this.inputContainer).val();
        if(feedbackText.trim().length < 1 ) { // feedback was not inserted
          this.msgContainer.addClass('rmp-feedback-widget__msg--alert');
          this.msgContainer.text(RmpFrontend.getEmptyFeedbackText);
          return;
        }
        this.submitButton.off();
        resolve(feedbackText);
      });
    });
  }

}

export default FeedbackWidget;
