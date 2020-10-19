window.$ = window.jQuery = require('jquery');
require('jquery-modal');
require('./libwebp-0.6.0.min');
require('./demux');
require('./viewer');
require('./theme');
require('./webp');

const menuBtn = document.querySelector('.nav-toggler');

menuBtn.addEventListener('click', function (e) {
  document.querySelector('body').classList.toggle('is-menu-opened');
});

const header = document.querySelector('.header');

function setBodyPaddingTop() {
  const h = header.offsetHeight;
  document.querySelector('body').style.paddingTop = h + 'px';
}

document.addEventListener("DOMContentLoaded", setBodyPaddingTop);
window.addEventListener("resize", setBodyPaddingTop);

window.changeMessage = function (mesVal) {
  $("#title3").html(mesVal);
  $('#message3').val(mesVal);
}

$(function () {
  $('.form').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const data = $(this).serialize();
    form.find('input[type="text"]').removeClass('is-invalid');
    form.find('.messages').html('');

    $.ajax({
      url: "/api/send", // куда отправляем
      type: "post", // метод передачи
      dataType: "json", // тип передачи данных
      data: data,
      // после получения ответа сервера
      success: function (result) {
        if (result.errors) {
          const errors = result.errors;
          for (let key in errors) {
            form.find(`input[name="${key}"]`).addClass('is-invalid');
            form.find('.messages').append(`<span style='color: red;'>${errors[key]}</span><br/>`);
          }
        }

        if (result.success) {
          form.find('.messages').append(`<span style='color: green;'>${result.success}</span><br/>`);
        }
      }
    });
  });
});