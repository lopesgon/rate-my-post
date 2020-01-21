import $ from 'jquery';
import InitWidget from './modules/InitWidget';
import AjaxLoad from './modules/AjaxLoad';
import BrowserSupport from './modules/BrowserSupport';
import rmp_frontend from 'rmp_frontend';

$(document).ready(() => {
  // deal with half-highlighted icons for older browsers
  let browserSupport = new BrowserSupport();
  // check if rating or results widget is present
  let ratingWidgets = document.getElementsByClassName('js-rmp-rating-widget');
  let resultsWidgets = document.getElementsByClassName('js-rmp-results-widget');
  let ratingWidgetContainers = document.getElementsByClassName('js-rmp-widgets-container');
  // exit if rating or results widget is not present
  if( ratingWidgets.length < 1 && resultsWidgets.length < 1  ) {
    return;
  }
  // save post ids to array
  let postsIDs = [];

  $(ratingWidgetContainers).each((index, item) => {
    let postID = $(item).attr('data-post-id');
    postsIDs.push(postID);
  });

  // remove duplicates
  let uniquePostIDs = postsIDs.filter((item, index) => postsIDs.indexOf(item) === index);
  // postsIDs = [...new Set(postsIDs)]; //requires polyfill

  // ajax load results
  if( rmp_frontend.ajaxLoad == 2 ) {
    let ajaxLoad = new AjaxLoad(uniquePostIDs[0]); // limit to one due to script executions
    let initWidget = new InitWidget(uniquePostIDs[0]);
    return;
  }

  // init each widget
  uniquePostIDs.forEach((postID) => {
    let initWidget = new InitWidget(postID);
  });

});
