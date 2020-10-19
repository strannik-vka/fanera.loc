window.webp = {

    init: function () {
        webp.support(function (support) {
            if (!support) {
                webp.to_canvas();
            }
        });
    },

    dimensions: function (el) {
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

    to_canvas: function () {
        if ($('img[src*=".webp"]:not([webp])').length) {
            var img = $('img[src*=".webp"]:not([webp]):eq(0)');
            webp.canvas(img.attr('src'), function (canvas) {
                img.attr({ webp: true });
                img.before(canvas).hide();
                setTimeout(webp.to_canvas, 0);
            });
        }
    },

    convertBinaryToArray: function (binary) {
        var arr = new Array();
        var num = binary.length;
        var i;
        for (i = 0; i < num; ++i)
            arr.push(binary.charCodeAt(i));
        return arr;
    },

    decode: function (response, callback) {
        response = webp.convertBinaryToArray(response);

        var imagearray = WebPRiffParser(response, 0);
        imagearray['response'] = response;
        imagearray['rgbaoutput'] = true;
        imagearray['dataurl'] = false;

        new WebPImageViewer(new WebPDecoder(), imagearray, function (frame) {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var width = imagearray['header'] ? imagearray['header']['canvas_width'] : frame['imgwidth'];
            var height = imagearray['header'] ? imagearray['header']['canvas_height'] : frame['imgheight'];
            canvas.height = height;
            canvas.width = width;
            var imagedata = ctx.createImageData(width, height);
            var rgba = frame['rgbaoutput'];
            for (var i = 0; i < width * height * 4; i++)
                imagedata.data[i] = rgba[i];
            ctx.putImageData(imagedata, 0, 0);
            callback(canvas);
        });
    },

    canvas: function (url, callback) {
        var http = navigator.appName == "Microsoft Internet Explorer"
            ? new ActiveXObject("Microsoft.XMLHTTP")
            : new XMLHttpRequest();

        http.open('get', url);

        if (http.overrideMimeType) {
            http.overrideMimeType('text/plain; charset=x-user-defined');
        } else {
            http.setRequestHeader('Accept-Charset', 'x-user-defined');
        }

        http.onreadystatechange = function () {
            if (http.readyState == 4) {
                var response = http.responseText.split('').map(function (e) {
                    return String.fromCharCode(e.charCodeAt(0) & 0xff);
                }).join('');
                webp.decode(response, callback);
            }
        };

        http.send(null);
    },

    support: function (callback) {
        if (typeof webp.support_status !== 'undefined') {
            callback(webp.support_status);
        } else {
            var webP = new Image();
            webP.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
            webP.onload = webP.onerror = function () {
                webp.support_status = webP.height === 2 ? true : false;
                callback(webp.support_status);
            }
        }
    }

};

module.exports = webp;

webp.init();