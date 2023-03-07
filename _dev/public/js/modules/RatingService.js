import LoadResults from './LoadResults';
import { RmpFrontend, Actions } from './RmpFrontend';

async function getRecapatchaToken() {
  return new Promise(async (resolve, reject) => {
    if(!RmpFrontend.isRecaptchaEnabled) { // recaptcha disabled
      resolve(undefined);
    }
    
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
    token: await getRecapatchaToken(),
    feedback: feedbackText
  }
  
  const response = await submit(data);
  new LoadResults(postID, widgetContainer, await response, rating);
}

export default saveRating;