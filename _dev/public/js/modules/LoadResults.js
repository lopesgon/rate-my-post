import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import SocialWidget from './SocialWidget';
import FeedbackWidget from './FeedbackWidget';
import IconHighlighter from './IconHighlighter';
import CookiePush from './CookiePush';
import AnalyticsPush from './AnalyticsPush';

class LoadResults {
  constructor(postID, widgetContainer, response, rating) {
    console.debug("RMP: LoadResults constructor");
    this.postID = postID;
    this.widgetContainer = widgetContainer;
    this.voteCount = response.voteCount;
    this.avgRating = response.avgRating;
    this.errorMsg = response.errorMsg;
    this.token = response.token;
    this.id = response.id;
    this.avgRatingContainer = $(this.widgetContainer + '.js-rmp-avg-rating, .js-rmp-results-widget--' + postID + ' .js-rmp-avg-rating');
    this.voteCountContainer = $(this.widgetContainer + '.js-rmp-vote-count, .js-rmp-results-widget--' + postID + ' .js-rmp-vote-count');
    this.noVotesContainer = $(this.widgetContainer + '.js-rmp-not-rated');
    this.resultsTextContainer = $(this.widgetContainer + '.js-rmp-results');
    this.ratingIcons = $(this.widgetContainer + '.js-rmp-rating-icon');
    this.resultIcons = $('.js-rmp-results-widget--' + postID + ' .js-rmp-results-icon');
    this.msgContainer = $(this.widgetContainer + '.js-rmp-msg');
    this.tnxMsg = rmp_frontend.afterVote;
    this.rating = rating;
    this.hideRatings = rmp_frontend.notShowRating;
    this.events();
  }

  events() {
    if( this.errorMsg && this.errorMsg.length > 0 ) {
      this.msgContainer.html(this.errorMsg.join('<br />'));
      this.msgContainer.addClass('rmp-rating-widget__msg--alert');
      this.ratingIcons.removeClass('rmp-icon--processing-rating rmp-icon--hovered');
      return;
    }

    this.avgRatingContainer.text(this.avgRating);
    this.voteCountContainer.text(this.voteCount);
    this.toneDownIcons();
    this.highlightIcons();
    this.noVotesContainer.addClass('rmp-rating-widget__not-rated--hidden');
    this.resultsTextContainer.removeClass('rmp-rating-widget__results--hidden')
    this.msgContainer.text(this.tnxMsg);
    let socialWidget = new SocialWidget(this.widgetContainer, this.rating);
    let feedbackWidget = new FeedbackWidget(this.widgetContainer, this.postID, this.rating, this.token, this.id);
    let cookiePush = new CookiePush(this.postID);
    let analyticsPush = new AnalyticsPush(this.rating);

    feedbackWidget.init();
  }

  toneDownIcons() {
    this.ratingIcons.removeClass('rmp-icon--full-highlight rmp-icon--half-highlight rmp-icon--processing-rating rmp-icon--hovered js-rmp-remove-half-star js-rmp-replace-half-star');
    this.resultIcons.removeClass('rmp-icon--full-highlight rmp-icon--half-highlight rmp-icon--processing-rating js-rmp-remove-half-star js-rmp-replace-half-star');
  }

  highlightIcons() {
    let highlightIcons = new IconHighlighter(this.widgetContainer, this.postID, this.avgRating);
  }

}

export default LoadResults;
