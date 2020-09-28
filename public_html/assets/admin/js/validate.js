'use strict';

var validate = {

    initOn: false,

    init: function () {
        validate.initOn = true;
        $(document).on('keyup change', '.is-invalid, .is-invalid *, .selectized', function () {
            $(this).removeClass('is-invalid');
            $('[data-error-input="' + $(this).attr('name') + '"]')
                .parents('.is-invalid')
                .removeClass('is-invalid');
            $('[data-error-input="' + $(this).attr('name') + '"]').remove();
        });
    },

    scroll: function (elem) {
        if ($('.modal.show').length > 0) return false;

        var scrollTop = (
            elem.css('display') == 'none' ?
                elem.parent().offset().top - 25 : elem.offset().top - 25
        );

        $('html, body').animate({
            scrollTop: scrollTop
        }, 300);
    },

    error: function (key, string, parent) {
        if(!validate.initOn) validate.init();

        var error_elem = typeof parent !== 'undefined' 
            ? parent.find('[name="' + key + '"]') 
            : $('[name="' + key + '"]');

        if (error_elem.length) {
            $('[data-error-input="' + key + '"]').remove();
            error_elem
                .addClass('is-invalid')
                .after('<div data-error-input="' + key + '" class="invalid-feedback">' + (typeof string === 'object' ? string.join('<br>') : string) + '</div>');
            return true;
        } else {
            return false;
        }
    },

    errors: function(response_errors, parent){
        if(!validate.initOn) validate.init();

        var errors = [], key_first = false;

        $.each(response_errors, function (key, val) {
            if (validate.error(key, val, parent)) {
                key_first = key;
            } else {
                errors.push(val);
            }
        });

        if(errors.length){
            alert(errors.join(', '));
        }

        if(key_first){
            if(typeof parent !== 'undefined'){
                validate.scroll(parent.find('[name="'+ key_first +'"]:eq(0)'));
            } else {
                validate.scroll($('[name="'+ key_first +'"]'));
            }
        }
    }

};