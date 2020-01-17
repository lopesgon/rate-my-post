import $ from 'jquery';

class BrowserSupport {
  constructor() {
    this.starsToBeReplaced = $('.js-rmp-replace-half-star');
    this.starsToBeRemoved = $('.js-rmp-remove-half-star');
    this.testElement = document.createElement( "x-test" );
    this.supportTest = typeof this.testElement.style.webkitBackgroundClip;
    this.events();
  }


  events() {
    let supportsClip = true;
    if(this.supportTest === 'undefined') {
      supportsClip = false;
    }

    if(supportsClip) { // modern browser, no need for adjustments
      return;
    }

    this.starsToBeReplaced.removeClass('rmp-icon--half-highlight')
    this.starsToBeReplaced.addClass('rmp-icon--full-highlight')
    this.starsToBeRemoved.removeClass('rmp-icon--half-highlight')
  }
}

export default BrowserSupport;
