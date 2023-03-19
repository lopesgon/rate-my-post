class ResultsWidget {
  constructor(postID) {
    if (!ResultsWidget._instance) {
      this.postID = postID;
      this.parentNode = document.querySelector('.js-rmp-results-widget--' + postID);
      
      this.visualRatingComponent = this.parentNode.querySelectorAll('.rmp-results-widget__visual-rating .js-rmp-results-icon');
      this.averageRatingComponent = this.parentNode.querySelector('.rmp-results-widget__avg-rating .js-rmp-avg-rating');
      this.voteCountComponent = this.parentNode.querySelector('.rmp-results-widget__vote-count .js-rmp-vote-count');
      ResultsWidget._instance = this;
    }

    return ResultsWidget._instance;
  }

  static update({ avgRating, voteCount }) {
    if (!ResultsWidget._instance) {
      throw new Error("Update method call without instanciated class object!");
    }
    
    if(avgRating && this.averageRatingComponent) {
      this.averageRatingComponent.textContent = avgRating;
    }

    if(voteCount && this.voteCountComponent) {
      this.voteCountComponent.textContent = voteCount;
    }
  }

}

export default ResultsWidget;