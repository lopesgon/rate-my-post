import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import FeedbackSubmitted from './FeedbackSubmitted';

class AjaxFeedback {
  constructor(widgetContainer, postID, feedback, token, ratingID) {
    console.debug("AjaxFeedback constructor");
    this.widgetContainer = widgetContainer;
    this.postID = postID;
    this.feedback = feedback;
    this.settings = rmp_frontend;
    this.duration = false;
    this.ratingID = ratingID;
    this.token = token;
    this.recaptcha = rmp_frontend.grecaptcha;
    this.recaptchaKey = rmp_frontend.siteKey;
    this.data = {
      action:'process_feedback',
      feedback : this.feedback,
      postID : this.postID,
      duration: this.duration,
      rating_id: this.ratingID,
      rating_token: this.token,
      nonce: this.settings.nonce,
    }
    this.events();
  }

  events() {
    if(this.recaptcha != 2) { // recaptcha disabled
      this.saveFeedback();
      return;
    }
    import('grecaptcha')
    .then((grecaptcha) => {
       grecaptcha.ready( () => {
         grecaptcha.execute(
           this.recaptchaKey,
           {action: 'RMPfeedback'}
         )
         .then((token) => {
           this.data.token = token;
           this.saveFeedback();
         })
       })
    })
  }

  saveFeedback() {
    $.ajax({
      type: 'POST',
      url: this.settings.admin_ajax,
      data: this.data,
      dataType: 'JSON',
      success: (response) => {
        let feedbackSubmitted = new FeedbackSubmitted(this.widgetContainer, response);
      }
    });
  }
}

export default AjaxFeedback;
