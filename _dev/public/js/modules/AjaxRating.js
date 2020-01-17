import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import LoadResults from './LoadResults';

class AjaxRating {
  constructor(postID, widgetContainer, rating, startTime) {
    this.postID = postID;
    this.widgetContainer = widgetContainer;
    this.rating = rating;
    this.duration = Math.floor(Date.now() / 1000) - startTime;
    this.settings = rmp_frontend;
    this.recaptcha = rmp_frontend.grecaptcha;
    this.recaptchaKey = rmp_frontend.siteKey;
    this.data = {
      action:'process_rating',
      star_rating : this.rating,
      postID : this.postID,
      duration: this.duration,
      nonce: this.settings.nonce,
    }
    this.events();
  }

  events() {
    if(this.recaptcha != 2) { // recaptcha disabled
      this.saveRating();
      return;
    }
    import('grecaptcha')
    .then((grecaptcha) => {
       grecaptcha.ready( () => {
         grecaptcha.execute(
           this.recaptchaKey,
           {action: 'RMPrating'}
         )
         .then((token) => {
           this.data.token = token;
           this.saveRating();
         })
       })
    })
  }

  saveRating() {
    $.ajax({
      type: 'POST',
      url: this.settings.admin_ajax,
      data: this.data,
      dataType: 'JSON',
      success: (response) => {
        let loadResults = new LoadResults(this.postID, this.widgetContainer, response, this.rating);
      }
    });
  }
}

export default AjaxRating;
