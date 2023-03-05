import $ from 'jquery';

class FeedbackSubmitted {
  constructor(widgetContainer, response) {
    console.debug("FeedbackSubmitted constructor");
    this.widgetContainer = widgetContainer;
    this.successMsg = response.successMsg;
    this.errorMsg = response.errorMsg;
    this.msgContainer = $(this.widgetContainer + '.js-rmp-feedback-msg');
    this.input = $(this.widgetContainer + '.js-rmp-feedback-input');
    this.button = $(this.widgetContainer + '.js-rmp-feedback-button');
    this.loader = $(this.widgetContainer + '.js-rmp-feedback-loader');
    this.events();
  }

  events() {
    this.loader.removeClass('rmp-feedback-widget__loader--visible');
    if( this.errorMsg.length ) {
      this.msgContainer.addClass('rmp-feedback-widget__msg--alert');
      this.msgContainer.html(this.errorMsg.join('<br />'));
      return;
    }
    this.msgContainer.removeClass('rmp-feedback-widget__msg--alert');
    this.msgContainer.text(this.successMsg);
    this.input.remove();
    this.button.remove();
  }
}

export default FeedbackSubmitted;
