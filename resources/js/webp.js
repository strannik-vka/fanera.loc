window.webp = {

    init: function () {
        if (!webp.support()) {
            webp.to_canvas();
            document.addEventListener('DOMSubtreeModified', function () {
                if (!webp.support()) {
                    webp.to_canvas();
                }
            });
        }
    },

    dimensions(el) {
        el = el[0];
        if (el.naturalWidth != undefined) {
            return {
                'real_width': el.naturalWidth,
                'real_height': el.naturalHeight,
                'client_width': el.width,
                'client_height': el.height
            };
        } else {
            var img = new Image();
            img.src = el.src;
            var real_w = img.width;
            var real_h = img.height;
            return {
                'real_width': real_w,
                'real_height': real_h,
                'client_width': el.width,
                'client_height': el.height
            };
        }
    },

    canvas: function (img) {
        var canvas = document.createElement('canvas'),
            context = canvas.getContext('2d');

        var dimensions = webp.dimensions(img);
        canvas.width = dimensions.real_width;
        canvas.height = dimensions.real_height;

        context.drawImage(img[0], 0, 0);

        img.before(canvas).hide();
    },

    to_canvas: function () {
        if ($('img[src*=".webp"]:not(webp)').length) {
            $('img[src*=".webp"]:not(webp)').each(function (event) {
                $(this).attr('webp', true);
                webp.canvas($(this));
            });
        }
    },

    support: function () {
        if (typeof webp.support_status !== 'undefined') {
            return webp.support_status;
        }

        var elem = document.createElement('canvas'), result = false;
        if (!!(elem.getContext && elem.getContext('2d'))) {
            result = elem.toDataURL('image/webp').indexOf('data:image/webp') == 0;
        }

        webp.support_status = result;

        return result;
    }

};

module.exports = webp;

webp.init();