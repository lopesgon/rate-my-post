import LoadResults from './LoadResults';
import FeedbackSubmitted from './FeedbackSubmitted';
import { RmpFrontend, Actions } from './RmpFrontend';

async function getRecapatchaToken() {
  if(!RmpFrontend.isRecaptchaEnabled) {
    return;
  }

  return new Promise(async (resolve, reject) => {
    const token = await import('grecaptcha')
    .then((grecaptcha) => {
        grecaptcha.ready( () => {
          grecaptcha.execute(
            RmpFrontend.getRecaptchaKey(),
            { action: Actions.RMP_RATING }
          );
        });
    });
  
    resolve(token);
  });
}

async function submit(payload) {
  const formData = new FormData();
  Object.keys(payload).forEach(key => formData.append(key, payload[key]));

  return fetch(RmpFrontend.getApiUrl, {
    method: 'POST',
    body: formData
  }).then((response) => response.json());
}

const saveRating = async (postID, widgetContainer, rating, startTime, feedbackText) => {
  let data = {
    action: Actions.PROCESS_WFEEDBACK,
    star_rating : rating,
    postID : postID,
    duration: Math.floor(Date.now() / 1000) - startTime,
    nonce: RmpFrontend.getNonce,
  }

  if(RmpFrontend.isRecaptchaEnabled) {
    data = {
      ...data,
      token: await getRecapatchaToken()
    }
  }

  if (RmpFrontend.isForcedFeedbackEnabled && feedbackText) {
    data = {
      ...data,
      feedback: feedbackText
    }
  }

  
  const response = await submit(data);
  if (RmpFrontend.isForcedFeedbackEnabled) {
    new FeedbackSubmitted(widgetContainer, response);
  } else {
    new LoadResults(postID, widgetContainer, response, rating);
  }
}

export default saveRating;