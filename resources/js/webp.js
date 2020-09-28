window.webp = {

    init: function () {
        if (!webp.support()) {
            webp.to_png();
            document.addEventListener('DOMSubtreeModified', function(){
                if (!webp.support()) {
                    webp.to_png();
                }
            });
        }
    },

    png: function (img) {
        var canvas = document.createElement('canvas'),
            context = canvas.getContext('2d');
        canvas.width = img.width();
        canvas.height = img.height();
        context.drawImage(img[0], 0, 0);
        return canvas.toDataURL('image/png');
    },

    to_png: function () {
        if($('img[src*=".webp"]:not(webp)').length){
            $('img[src*=".webp"]:not(webp)').each(function (event) {
                $(this).attr({
                    'webp': 'true',
                    'src': webp.png($(this))
                });
            });
        }
    },

    support: function () {
        if(typeof webp.support_status !== 'undefined'){
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