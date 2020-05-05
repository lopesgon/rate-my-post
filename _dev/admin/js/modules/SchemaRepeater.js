import $ from 'jquery';

class SchemaRepeater {
  constructor() {
    this.addBtn = $('.js-rmp-schema-field-add-repeater');
    this.removeBtn = $('.js-rmp-schema-field-remove-repeater');
    this.events();
  }

  events() {
    this.addBtn.on('click', (event) => this.addRepeater());
    this.removeBtn.on('click', (event) => this.removeRepeater());
  }

  addRepeater() {
    let repeaterToCopy = $(event.currentTarget).parent().siblings('.js-rmp-single-from-repeater').last();
    repeaterToCopy.clone().insertAfter(repeaterToCopy);

  }

  removeRepeater() {
    let repeaters = $(event.currentTarget).parent().siblings('.js-rmp-single-from-repeater');

    if(repeaters.length > 1) {
      repeaters.last().remove();
    }

  }

}

export default SchemaRepeater;
