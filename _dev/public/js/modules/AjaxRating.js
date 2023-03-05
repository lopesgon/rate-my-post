import { RmpFrontend, Actions } from "./RmpFrontend";
import LoadResults from './LoadResults';

class AjaxRating {
  constructor(postID, widgetContainer, startTime) {
    console.debug("AjaxRating constructor");
    this.postID = postID;
    this.widgetContainer = widgetContainer;
    this.startTime = startTime;
  }

  async rate(rating, feedback) {
    let payload = {
      action: Actions.PROCESS_RATING,
      star_rating: rating,
      postID: this.postID,
      duration: Math.floor(Date.now() / 1000) - this.startTime,
      nonce: RmpFrontend.getNonce,
      token: await this.getCaptchaToken(),
      feedback: feedback,
    };

    if (feedback) { // is not null when feedback_forced is enabled
      payload = {
        ...payload,
        // action: Actions.PROCESS_WFEEDBACK,
      };
    }

    await this.saveRating(payload, rating);
  }

  async getCaptchaToken() {
    if (!RmpFrontend.isRecaptchaEnabled) { // recaptcha disabled
      return;
    }

    const token = await import('grecaptcha')
      .then((grecaptcha) => {
        grecaptcha.ready(() => {
          return grecaptcha.execute(
            RmpFrontend.getRecaptchaKey(),
            { action: Actions.RMP_RATING }
          )
            .then((token) => token);
        });
      });

    return token;
  }

  async saveRating(payload, rating) {
    const formData = new FormData();
    Object.keys(payload).forEach(key => formData.append(key, payload[key]));

    return fetch(RmpFrontend.getApiUrl, {
      method: "POST",
      body: formData
    }).then((response) => response.json())
      .then((responseBody) => {
        new LoadResults(this.postID, this.widgetContainer, responseBody, rating);
        return responseBody;
      });
  }
}

export default AjaxRating;