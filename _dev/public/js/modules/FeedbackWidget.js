import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import AjaxFeedback from './AjaxFeedback';

class FeedbackWidget {
  constructor(widgetContainer, postID, rating, token, ratingID) {
    this.widgetContainer = widgetContainer;
    this.postID = postID;
    this.feedbackEnabled = rmp_frontend.feedback;
    this.maxRating = rmp_frontend.positiveThreshold;
    this.emptyFeedbackMsg = rmp_frontend.emptyFeedback;
    this.msgContainer = $(this.widgetContainer + '.js-rmp-feedback-msg');
    this.rating = rating;
    this.ratingWidget = $(this.widgetContainer + '.js-rmp-rating-widget');
    this.feedbackWidget = $(this.widgetContainer + '.js-rmp-feedback-widget');
    this.inputContainer = $(this.widgetContainer + '.js-rmp-feedback-input');
    this.submitButton = $(this.widgetContainer + '.js-rmp-feedback-button');
    this.loader = $(this.widgetContainer + '.js-rmp-feedback-loader');
    this.input = false;
    this.token = token;
    this.ratingID = ratingID;
    this.events();
  }

  events() {
    if(this.feedbackEnabled != 2 || this.rating > this.maxRating) {
      return;
    }
    this.feedbackWidget.addClass('rmp-feedback-widget--visible');
    this.ratingWidget.addClass('rmp-rating-widget--hidden');
    this.submitButton.on('click', (event) => this.submitButtonClicked());
  }

  submitButtonClicked() {
    this.input = $(this.inputContainer).val();
    if(this.input.trim().length < 1 ) { // feedback was not inserted
      this.msgContainer.addClass('rmp-feedback-widget__msg--alert');
      this.msgContainer.text(this.emptyFeedbackMsg);
      return;
    }
    this.submitButton.off();
    this.loader.addClass('rmp-feedback-widget__loader--visible')
    let saveFeedback = new AjaxFeedback(this.widgetContainer, this.postID, this.input, this.token, this.ratingID);
  }

}

export default FeedbackWidget;
