'use strict';

var core = {

    init: function () {
        bsCustomFileInput.init();
        core.tooltip();
        core.selectize();
        $('.editor').each(function () {
            $(this).editor();
        });
        core.text_paset();
        core.autoresize();

        $(document).on('input', '[data-id] [name]', function(){
            core.edit_item(
                $(this).parents('[data-id]').attr('data-id'),
                $(this).attr('name'),
                $(this).val()
            );
        });

        $(document).on('change', '[data-id] select[name]', function(){
            core.edit_item(
                $(this).parents('[data-id]').attr('data-id'),
                $(this).attr('name'),
                $(this).val()
            );
        });
    },

    autoresize: function(){
        $('textarea').autoResize();
    },

    text_paset: function () {
        var texts = document.querySelectorAll('*[contenteditable="true"]');
        if (texts) {
            texts.forEach(function (elem) {
                elem.addEventListener('paste', function (e) {
                    // Variables 
                    var clipboardData, pastedData;
                    // Stop data actually being pasted into div
                    e.stopPropagation();
                    e.preventDefault();
                    // Get pasted data via clipboard API
                    clipboardData = e.clipboardData || window.clipboardData;
                    pastedData = clipboardData.getData('Text');
                    console.log(pastedData);
                    // Change \n to <br>
                    // I use this because then I will make another things with the <br> tags
                    pastedData = pastedData.replace(/(?:\r\n|\r|\n)/g, '<br />');
                    /*
                        Here a function that will get the character offset of the caret within the specified element. However, this is a naive implementation that will almost certainly have inconsistencies with line breaks. It makes no attempt to deal with text hidden via CSS (I suspect IE will correctly ignore such text while other browsers will not). To handle all this stuff properly would be tricky. I've now attempted it for my Rangy library. 
                    */
                    var caretOffset = 0;
                    var doc = this.ownerDocument || this.document;
                    var win = doc.defaultView || doc.parentWindow;
                    var sel;
                    if (typeof win.getSelection != "undefined") {
                        sel = win.getSelection();
                        if (sel.rangeCount > 0) {
                            var range = win.getSelection().getRangeAt(0);
                            var preCaretRange = range.cloneRange();
                            preCaretRange.selectNodeContents(this);
                            preCaretRange.setEnd(range.endContainer, range.endOffset);
                            caretOffset = preCaretRange.toString().length;
                        }
                    } else if ((sel = doc.selection) && sel.type != "Control") {
                        var textRange = sel.createRange();
                        var preCaretTextRange = doc.body.createTextRange();
                        preCaretTextRange.moveToElementText(this);
                        preCaretTextRange.setEndPoint("EndToEnd", textRange);
                        caretOffset = preCaretTextRange.text.length;
                    }
                    // Set the text at the carret position
                    this.innerHTML = [this.innerHTML.slice(0, caretOffset), pastedData, this.innerHTML.slice(caretOffset)].join('');
                    // Set the carret to the correct position
                    var range = document.createRange();
                    sel = window.getSelection();
                    // Try to set the range
                    try {
                        range.setStart(this.firstChild, caretOffset + pastedData.length);
                    } catch (err) { }
                    // Range options
                    range.collapse(true);
                    sel.removeAllRanges();
                    sel.addRange(range);
                });
            });
        }
    },

    selectize: function () {
        $('select').selectize();
    },

    tooltip: function () {
        $('[data-toggle="tooltip"]').tooltip();
    },

    remove_item: function (id) {
        if (confirm('Уверены, что хотите удалить?')) {
            $.post(location.pathname + '/' + id, {
                _token: csrf_token,
                _method: 'delete'
            }, function () {
                $('[data-id="' + id + '"]').slideUp(function () {
                    $(this).remove();
                });
            }, 'json');
        }
    },

    edit_item_timer: false,
    edit_item: function (id, name, value) {
        if(core.edit_item_timer) clearTimeout(core.edit_item_timer);
        core.edit_item_timer = setTimeout(function(){
            var data = {
                _token: csrf_token,
                _method: 'PUT'
            };

            data[name] = value;

            $.post(location.pathname + '/' + id, data, function (response) {
                if (response && response.errors) {
                    validate.errors(response.errors, $('[data-id="'+ id +'"]'));
                } else {
                    noty({
                        type: 'success',
                        text: 'Успешно сохранено'
                    });
                }
            });
        }, 800);
    }

};

$(core.init);