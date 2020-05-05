import $ from 'jquery';
import rmp_options from 'rmp_options';

class AjaxSchema {
  constructor() {
    this.updateBtn = $('.js-rmp-mb-schema-btn');
    this.msg = $('.js-rmp-mb-schema-msg');
    this.schemaSelect = $('.js-rmp-schema-select');
    this.postID = rmp_options.postID,
    this.ajaxUrl = rmp_options.admin_ajax;
    this.updateAction = 'update_schema';
    this.data = {
      nonce: rmp_options.nonce,
    }
    this.events();
  }

  events() {
    this.updateBtn.on('click', (event) => this.updateSchema());
  }

  updateSchema() {
    this.resetDataObject()
    this.removeStatusIndicators();
    this.updateBtn.addClass('rmp-btn--processing');
    this.data['action'] = this.updateAction;
    this.data['postID'] = rmp_options.postID;
    // Get schema details
    let schemaType = this.schemaSelect.find(':selected').val();
    let schemaContainerClass = '.js-rmp-schema-' + schemaType.toLowerCase();
    let schemaContainer = $(schemaContainerClass);

    if(schemaContainer.length) {
      let schemaFields = {};
      // process all schema inputs
      let schemaInputs = $(schemaContainerClass + ' .js-rmp-schema-field');

      // deal with all, but repeaters
      schemaInputs.each((index, element) => {
        let parentSchemaFieldName = $(element).attr('data-schema-key-parent');
        let schemaFieldName = $(element).attr('data-schema-key');

        let schemaFieldValue = $(element).children('input').val();

        if(parentSchemaFieldName === undefined) { // has no parent, safe to store
          schemaFields[schemaFieldName] = schemaFieldValue;
        }
      });

      // deal with repeaters
      let schemaRepeaters = $(schemaContainerClass + ' .js-rmp-schema-repeater');

      if(schemaRepeaters.length) {

        schemaRepeaters.each((index, element) => {

          let schemaFieldNameTopLevel = $(element).attr('data-schema-key-repeater');

          let schemaSingleFromRepeater = $(element).children('.js-rmp-single-from-repeater');

          let repeatersData = [];

          schemaSingleFromRepeater.each((index, element) => {

            let childData = {};

            let schemaStructure = $(element).attr('data-schema-structure');

            if(schemaStructure === 'array') {
              childData = [];
            }

            let children = $(element).children('.js-rmp-schema-field');

            children.each((index, element) => {
              let schemaFieldName = $(element).attr('data-schema-key');
              console.log(schemaFieldName);
              let schemaFieldValue = $(element).children('input').val();

              if(!Array.isArray(childData)) {
                childData[schemaFieldName] = schemaFieldValue;
              } else {
                childData.push(schemaFieldValue);
              }
            });

            // push to array
            repeatersData.push(childData);

          }); // end of schemaSingleFromRepeater.each


          schemaFields[schemaFieldNameTopLevel] = repeatersData;

        }); // end of schemaRepeaters.each
      } // end of schemaRepeaters.length

      console.log(schemaFields);

    } // end of schemaContainer.length

    // $.ajax({
    //   type: 'POST',
    //   url: this.ajaxUrl,
    //   data: this.data,
    //   dataType: 'JSON',
    //   success: (response) => {
    //     this.afterUpdate(response, this.voteCount.val(), this.avgRating.val());
    //   }
    // });
  }

  afterUpdate(response, newVoteCount, newAvgRating) {
    // if( response.errorMsg.length ) {
    //   this.msg.addClass('rmp-meta-box__action-msg--alert');
    //   this.updateBtn.addClass('rmp-btn--alert');
    //   this.msg.html(response.errorMsg.join('<br />'));
    //   this.voteCount.val(this.currentVoteCount);
    //   this.avgRating.val(this.currentAvgRating);
    //   setTimeout( () => {
    //     this.removeStatusIndicators();
    //   }, 2000 );
    //   return;
    // }
    // this.currentAvgRating = newAvgRating;
    // this.currentVoteCount = newVoteCount;
    // this.msg.addClass('rmp-meta-box__action-msg--success');
    // this.updateBtn.addClass('rmp-btn--success');
    // this.msg.text(response.successMsg);
    // setTimeout( () => {
    //   this.removeStatusIndicators();
    // }, 2000 );
  }

  removeStatusIndicators() {
    // this.updateBtn.removeClass('rmp-btn--success rmp-btn--alert rmp-btn--processing');
    // this.msg.removeClass('rmp-meta-box__action-msg--success rmp-meta-box__action-msg--alert');
    // this.msg.html('');
  }

  resetDataObject() {
    this.data = {
      nonce: rmp_options.nonce,
    }
  }

}

export default AjaxSchema;
