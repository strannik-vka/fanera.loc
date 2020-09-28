var hexdec = require('locutus/php/math/hexdec');

window.theme = {

    colors: {
        'BFA277': {}, '83363A': {}, '2283DD': {}, '6A95BD': {}, '3766E0': {}, 'FF8A47': {}, 'FF6536': {}, 'DD3030': {}, 'FFD747': {}, '219653': {}, '56CCF2': {}, '26BFBF': {}, 'FC6170': {}, '906BE1': {}, '2868B0': {}, '334293': {}, 'CF471D': {}, '61453A': {}, '7F7F7F': {}, '4F6572': {}, 'A7B22F': {}, 'BD1852': {}, '01796F': {}, '2D343A': {}, '98D156': {}, '2283DD - 6A95BD': {
            background: 'linear-gradient(94.39deg, COLOR1 -70.72%, COLOR2 103.11%)',
        }, '98D156 - 7AB936': {
            background: 'linear-gradient(180deg, COLOR1 0%, COLOR2 100%)'
        }, '27AFD9 - 3EDF9C': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, '6777DA - 7451AB': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, '12A668 - 38B990': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, '2D3741 - 465460': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, 'EB3C43 - EF5D65': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, '28A5E1 - 4280E6': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }, 'EE739F - EA8968': {
            background: 'linear-gradient(89.9deg, COLOR1 0.06%, COLOR2 101%)'
        }
    },

    init: function () {
        if (typeof auth !== 'undefined' && auth) {
            theme.panel();
        }
    },

    gradient_color: function (color1, color2) {
        var ratio = 0.5;
        var hex = function (x) {
            x = x.toString(16);
            return (x.length == 1) ? x + x : x;
        };
        var r = Math.ceil(parseInt(color1.substring(0, 2), 16) * ratio + parseInt(color2.substring(0, 2), 16) * (1 - ratio));
        var g = Math.ceil(parseInt(color1.substring(2, 4), 16) * ratio + parseInt(color2.substring(2, 4), 16) * (1 - ratio));
        var b = Math.ceil(parseInt(color1.substring(4, 6), 16) * ratio + parseInt(color2.substring(4, 6), 16) * (1 - ratio));
        var middle = hex(r) + hex(g) + hex(b);
        return middle;
    },

    different_shade: function (rgb, type, percent) {
        var newShade = [],
            percentageChange = percent ? percent : 40;

        if (type == 'lighter') {
            newShade = [
                255 - (255 - rgb[0]) + percentageChange,
                255 - (255 - rgb[1]) + percentageChange,
                255 - (255 - rgb[2]) + percentageChange
            ];
        } else {
            newShade = [
                rgb[0] - percentageChange,
                rgb[1] - percentageChange,
                rgb[2] - percentageChange
            ];
        }

        return 'rgb(' + newShade[0] + ', ' + newShade[1] + ', ' + newShade[2] + ')';
    },

    hex2rgb: function (hex) {
        return [
            hexdec(hex.substr(1, 2)),
            hexdec(hex.substr(3, 2)),
            hexdec(hex.substr(5, 2))
        ];
    },

    panel: function () {
        var elems = '';

        $.each(theme.colors, function (color, css) {
            var color_arr = color.indexOf('-') > -1 ? color.split(' - ') : [color],
                bg = css.background 
                    ? css.background
                        .replace('COLOR1', '#'+ color_arr[0])
                        .replace('COLOR2', '#'+ color_arr[1]) 
                    : '#' + color;
                    
            elems += '<div color="' + color + '" style="background: ' + bg + '" class="theme_color"></div>';
        });

        $('body').append('<div class="theme_panel">' + elems + '</div>');

        $('.theme_color').on('click', function () {
            theme.change($(this));
        });
    },

    color_tones: function (primary) {
        var color_rgb = theme.hex2rgb(primary),
            shadow = 'rgba(' + color_rgb[0] + ', ' + color_rgb[1] + ', ' + color_rgb[2] + ', .1)',
            lighter = 'rgba(' + color_rgb[0] + ', ' + color_rgb[1] + ', ' + color_rgb[2] + ', .35)',
            dark = theme.different_shade(color_rgb, false, 40);

        return {
            primary: primary,
            shadow: shadow,
            lighter: lighter,
            dark: dark
        };
    },

    color_replace: function(color, color1, color2){
        return theme.colors[color].background.replace('COLOR1', color1).replace('COLOR2', color2);
    },

    change: function (elem) {
        $('.theme_color.active').removeClass('active');
        elem.addClass('active');

        var color = elem.attr('color'), css = '';

        if (color.indexOf('-') > -1) {
            var colors = color.split(' - '),
                colour_tone1 = theme.color_tones('#' + colors[0]),
                colour_tone2 = theme.color_tones('#' + colors[1]),
                gradient_color = theme.gradient_color(colors[0], colors[1]),
                gradient_color_rgb = theme.hex2rgb('#'+ gradient_color),
                colour_tones = {
                    primary: theme.color_replace(color, colour_tone1.primary, colour_tone2.primary),
                    shadow: 'rgba('+ gradient_color_rgb[0] +', '+ gradient_color_rgb[1] +', '+ gradient_color_rgb[2] +', 0.1)',
                    lighter: theme.color_replace(color, colour_tone1.lighter, colour_tone2.lighter),
                    dark: theme.color_replace(color, colour_tone1.dark, colour_tone2.dark)
                }, 
                css = '.btn--primary:hover {background: '+ theme.color_replace(color, colour_tone2.primary, colour_tone1.primary) +'}.card__image svg, .card__image svg * {fill: #'+ gradient_color +'!important;}.btn--light {border: 2px solid rgba('+ gradient_color_rgb[0] +', '+ gradient_color_rgb[1] +', '+ gradient_color_rgb[2] +', 0.35);}.btn--light:hover {border: 2px solid rgb('+ gradient_color_rgb[0] +', '+ gradient_color_rgb[1] +', '+ gradient_color_rgb[2] +');}.section__title, .site-title,.text-primary {color: #'+ gradient_color +'!important;background: '+ colour_tones.primary +';-webkit-background-clip: text;-webkit-text-fill-color: transparent;}.btn--light {color: #'+ gradient_color +'}';
        } else {
            var colour_tones = theme.color_tones('#' + color),
                css = '.card__image svg, .card__image svg * {fill: #'+ color +'!important;}';
        }

        $('#theme_css').remove();
        $('head').append('<style id="theme_css">' + css + ':root {--c-primary-shadow: ' + colour_tones.shadow + ';--c-primary-light: ' + colour_tones.lighter + ';--c-primary: ' + colour_tones.primary + ';--c-primary-dark: ' + colour_tones.dark + ';}</style>');

        theme.save();
    },

    save: function () {
        $.ajax({
            url: '/admin/setting/1',
            type: 'PUT',
            dataType: 'json',
            data: {
                _token: csrf_token,
                color: $('#theme_css').html()
            }
        });
    }

};

module.exports = theme;

theme.init();