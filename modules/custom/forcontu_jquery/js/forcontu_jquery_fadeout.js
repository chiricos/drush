(function ($) {
  'use strict';
  $(document).ready(function() {
    $(".fadeout").delay(2000).fadeOut(3000);
    $('input[value="Monday"]').parent().css("color", "red");
    $('#page').css('background','red');
  });
})(jQuery)