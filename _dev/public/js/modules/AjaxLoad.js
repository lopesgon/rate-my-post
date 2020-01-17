import $ from 'jquery';
import rmp_frontend from 'rmp_frontend';
import IconHighlighter from './IconHighlighter';
import BrowserSupport from './BrowserSupport';

class AjaxLoad {
  constructor(postID) {
    this.postID = postID;
    this.widgetContainer = '.js-rmp-widgets-container--' + postID + ' ';
    this.settings = rmp_frontend;
    this.avgRatingContainer = $(this.widgetContainer + '.js-rmp-avg-rating, .js-rmp-results-widget--' + postID + ' .js-rmp-avg-rating');
    this.voteCountContainer = $(this.widgetContainer + '.js-rmp-vote-count, .js-rmp-results-widget--' + postID + ' .js-rmp-vote-count');
    this.noVotesContainer = $(this.widgetContainer + '.js-rmp-not-rated');
    this.resultsTextContainer = $(this.widgetContainer + '.js-rmp-results');
    this.noVotesContainer = $(this.widgetContainer + '.js-rmp-not-rated');
    this.resultsTextContainer = $(this.widgetContainer + '.js-rmp-results');
    this.msgContainer = $(this.widgetContainer + '.js-rmp-msg');
    this.data = {
      action:'load_results',
      postID: this.postID,
      nonce: this.settings.nonce,
    }
    this.events();
  }


  events() {
    $.ajax({
      type: 'POST',
      url: this.settings.admin_ajax,
      data: this.data,
      dataType: 'JSON',
      success: (response) => {
        let voteCount = response.voteCount;
        let avgRating =  response.avgRating;
        let error =  response.errorMsg;
        this.loadResults(voteCount, avgRating, error);
      }
    });
  }

  loadResults(voteCount, avgRating, error) {
    if( error.length ) {
      this.msgContainer.text(error);
      this.msgContainer.addClass('rmp-rating-widget__msg--alert');
      return;
    }
    // inject data
    this.avgRatingContainer.text(avgRating);
    this.voteCountContainer.text(voteCount);
    // highlight icons
    let highlightIcons = new IconHighlighter(this.widgetContainer, this.postID, avgRating);
    // handle classes
    if( avgRating === 0 ) {
      this.noVotesContainer.removeClass('rmp-rating-widget__not-rated--hidden')
      this.resultsTextContainer.addClass('rmp-rating-widget__results--hidden')
    } else {
      this.noVotesContainer.addClass('rmp-rating-widget__not-rated--hidden')
      this.resultsTextContainer.removeClass('rmp-rating-widget__results--hidden')
    }
    let browserSupport = new BrowserSupport();
  }
}

export default AjaxLoad;
