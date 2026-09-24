/**
 * Industry Elementor widgets, front end: the Mailchimp signup form, the review
 * and gallery carousels, the booking form's date fields, styled selects, the
 * counters, the video popup, the hexagon icon classes and the quote request
 * form. No jQuery.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  //  Mailchimp ajax
  UI.ajaxChimp('#mc_embed_signup form');

  // Exibition widget owlCarousel
  UI.owl('.active-review-carusel', {
    items: 1,
    loop: true,
    margin: 30,
    dots: true
  });

  // Datepicker
  UI.datepicker('#datepicker', { wrap: false });
  UI.datepicker('#datepicker2', { wrap: false });

  if (document.getElementById('default-select')) {
    UI.enhanceSelects('select');
  }
  if (document.getElementById('service-select')) {
    UI.enhanceSelects('select');
  }

  //  Gallery
  UI.owl('.active-gallery', {
    items: 6,
    loop: true,
    dots: true,
    autoplay: true,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 1
      },
      768: {
        items: 2
      },
      900: {
        items: 6
      }
    }
  });

  //  Counter Js
  if (document.querySelector('.faq-area')) {
    UI.counter('.counter', { time: 1000 });
  }

  UI.magnific('.play-btn', {
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  // Hexagon icon boxes (what hexagons.min.js did): the parent of a sized
  // hexagon gets its margin class, and a hexagon holding a brand icon gets
  // that brand's colour class (the -inv one for inverted hexagons).
  UI.ready(function () {
    function addToParents(selector, add, remove) {
      UI.toElements(selector).forEach(function (el) {
        var parent = el.parentElement;
        if (!parent) return;
        parent.classList.add(add);
        if (remove) parent.classList.remove(remove);
      });
    }

    ['lg', 'md', 'sm', 'xs'].forEach(function (size) {
      addToParents('.hb-' + size, 'hb-' + size + '-margin');
    });

    var brands = [
      ['facebook', ['fa-facebook', 'fa-facebook-square']],
      ['twitter', ['fa-twitter', 'fa-twitter-square']],
      ['google-plus', ['fa-google-plus', 'fa-google-plus-square']],
      ['youtube', ['fa-youtube', 'fa-youtube-square', 'fa-youtube-play']],
      ['linkedin', ['fa-linkedin', 'fa-linkedin-square']],
      ['tumblr', ['fa-tumblr', 'fa-tumblr-square']],
      ['rss', ['fa-rss', 'fa-rss-square']],
      ['pinterest', ['fa-pinterest', 'fa-pinterest-square']],
      ['vimeo', ['fa-vimeo-square']],
      ['github', ['fa-github', 'fa-github-square', 'fa-github-alt']],
      ['flickr', ['fa-flickr']],
      ['dropbox', ['fa-dropbox']],
      ['xing', ['fa-xing', 'fa-xing-square']],
      ['skype', ['fa-skype']],
      ['dribbble', ['fa-dribbble']],
      ['tencent-weibo', ['fa-tencent-weibo']],
      ['instragram', ['fa-instragram']]
    ];
    brands.forEach(function (brand) {
      var name = 'hb-' + brand[0];
      function within(scope) {
        return brand[1].map(function (icon) { return scope + ' .' + icon; }).join(', ');
      }
      addToParents(within('.hb'), name);
      addToParents(within('.hb.inv'), name + '-inv', name);
    });
  });

  // Appointment form ajax
  UI.ready(function () {
    var form = document.getElementById('form-wrap');
    if (!form) return;

    function value(selector) {
      var field = document.querySelector(selector);
      return field ? field.value : '';
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      e.stopPropagation();

      UI.request(window.ajax_object.ajax_url, {
        method: 'post',
        data: {
          action: 'industry_booking_form_data',
          uname: value("[name='uname']"),
          uemail: value("[name='uemail']"),
          uphone: value("[name='uphone']"),
          uservice: value("[name='uservice']"),
          request_submit_nonce_check: value('#request_submit_nonce_check'),
          umessage: value("[name='umessage']")
        }
      }).then(function (res) {
        UI.toElements('.submit-info').forEach(function (el) {
          el.innerHTML = res;
        });
      });
    });
  });
}());
