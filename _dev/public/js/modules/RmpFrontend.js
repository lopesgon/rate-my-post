import rmp_frontend from 'rmp_frontend';

// Actions Enum
const Actions = {
  PROCESS_RATING: 'process_rating',
  PROCESS_WFEEDBACK: 'process_rating_with_feedback',
  RMP_RATING: 'RMPrating',
  RMP_FEEDBACK: 'RMPfeedback',
  RMP_DISMISS: 'rmp_dismiss_notice',
  MIGRATE_DATA: 'migrate_data',

}

// RmpFrontend Configuration
const RmpFrontend = {
  getApiUrl: rmp_frontend.admin_ajax,
  isFeedbackEnabled: rmp_frontend.feedback == 2,
  isForcedFeedbackEnabled: rmp_frontend.forcedFeedback == 2,
  isPreventAccidentalEnabled: rmp_frontend.preventAccidental == 2,
  isRatingTooltipEnabled: rmp_frontend.hoverTexts == 2,
  isRecaptchaEnabled: rmp_frontend.grecaptcha == 2,
  isAjaxLoadingEnabled: rmp_frontend.ajaxLoad == 2,

  getEmptyFeedbackText: rmp_frontend.emptyFeedback,
  getNonce: rmp_frontend.nonce,
  
  getRecaptchaKey: () => {
    if (rmp_frontend.grecaptcha != 2) {
      console.error("RMP: accessor usage detected for disabled functionality");
    }
    return rmp_frontend.siteKey;
  },

  isNegativeRating(rating) {
    return rating <= rmp_frontend.positiveThreshold
  },
}

export { Actions, RmpFrontend };